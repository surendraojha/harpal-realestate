

 <?php
 $route = \Request::route()->getName();
 ?>
 <section class="bannerSec <?php if( $route != 'front.home'): ?> optionalPages <?php endif; ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bannerImg">
                        <?php if( $route == 'front.home'): ?>
                            <img src="<?php echo e(asset('uploads/' . @$setting->banner)); ?>" alt="Banner Image">
                        <?php endif; ?>
                        <div class="searchForm" id="searchTab">
                            <section id="searchFormHolderSection">
                                <h5 class="d-block d-md-none mb-3">
                                    Ease your Search
                                </h5>
                                <form action="<?php echo e(route('filter.property')); ?>">

                                    <section class="mb-search  mb-search-banner ">
                                        <div class="mb-container">
                                            <div class="mb-search-container">
                                                <div class="mb-search__wrap">
                                                    <div class="mb-search__location">
                                                        <div class="mb-search__location__tag-wrap"
                                                            id="keyword_autoSuggestSelectedDiv"
                                                            onclick="event.stopPropagation(); $('#keyword').focus();fireSearchBoxClickedGTM();">


                                                            <select name="location[]"
                                                                class="formCustom multiple-location select2 locationsearch mb-search__input"
                                                                
                                                                 multiple>
                                                                <optgroup label="Search For Areas">
                                                                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($value->id); ?>">
                                                                            <?php echo e($value->location); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </optgroup>
                                                            </select>
                                                            <!-- <input  type="text" class="" placeholder="Enter City, Locality, Project" onfocus="showSearchHint(event, this); mb_hideCompactView('keyword');" autocomplete="off" onkeyup="homepageAutoSuggest();" value=""> -->
                                                        </div>
                                                        <div class="mb-search__location__error" id="location-error-id">
                                                            Please
                                                            enter a valid Location or Project</div>
                                                    </div>
                                                    <div class="mb-search__property" id="propType_buy">
                                                        <div class="mb-search__title"
                                                            onclick="showPropertyDropDown(event, this);fireSearchBoxClickedGTM();">
                                                            <span id="buy_proertyTypeDefault" class="placeHolderIn">Property
                                                                Type</span> <span id="buy_proertyTypeCount"
                                                                style="display: inline;" class="moreProperty"></span>
                                                        </div>
                                                        <div class="mb-search__relative">
                                                            <div class="mb-search__dropdown"
                                                                onclick="event.stopPropagation();">
                                                                <div class="mb-search__property__wrap">
                                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div
                                                                            class="mb-search__property__group prop-type-residential open-state">
                                                                            <div class="mb-search__property__title"
                                                                                onclick="openPropertyType(this);">
                                                                                <?php echo e($value->title); ?></div>
                                                                            <div class="mb-search__property__data">
                                                                                <div class="data-overflow">
                                                                                    <?php $__currentLoopData = $value->subcategory->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <?php if($v->status == 1): ?>
                                                                                            <div class="mb-search__property__item"
                                                                                                onclick="clickOnHomePagePropertyType('propType_buy_chk_<?php echo e($v->id); ?>', 'category_id', 'buy_proertyTypeDefault','propType_buy_disable_1', 'category_id[]','buy_proertyTypeCount', 'Y','Property Type');">
                                                                                                <input
                                                                                                    class="mb-search__property__item__input"
                                                                                                    type="checkbox"
                                                                                                    value="<?php echo e($v->id); ?>"
                                                                                                    name="category_id[]"
                                                                                                    id="residential_<?php echo e($v->id); ?>"
                                                                                                    title="Flat"
                                                                                                    id="propType_buy_chk_10002_10003_10021_10022">
                                                                                                <label
                                                                                                    class="mb-search__property__item__label"
                                                                                                    for="residential_<?php echo e($v->id); ?>"
                                                                                                    id="<?php echo e($v->id); ?>"><?php echo e($v->title); ?></label>
                                                                                            </div>
                                                                                        <?php endif; ?>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="categoryType" name="categoryType"
                                                        value="B">
                                                    <div class="mb-search__budget">
                                                        <div class="mb-search__title"
                                                            onclick="showBudgetDropDown(event, this);fireSearchBoxClickedGTM();">
                                                            <span id="rent_budget_lbl" class="buy_budget_lbl">Select
                                                                Budget</span>
                                                        </div>
                                                        <div class="mb-search__relative">
                                                            <div class="mb-search__dropdown"
                                                                onclick="event.stopPropagation();">
                                                                <div class="mb-search__budget__wrap">
                                                                    <input type="text"
                                                                        class="mb-search__budget__fld-min-max"
                                                                        id="budgetMin" maxlength="8" name="min"
                                                                        onclick="homeRangeMinLinkClick(this);"
                                                                        value="" onblur="validateBudget();"
                                                                        placeholder="Min Price">
                                                                    <input type="text"
                                                                        class="mb-search__budget__fld-min-max"
                                                                        id="budgetMax" maxlength="9" name="max"
                                                                        value=""
                                                                        onclick="homeRangeMaxLinkClick(this);"
                                                                        onblur="validateBudget();" placeholder="Max Price">
                                                                </div>
                                                                <div class="mb-search__min-max webkit__scroll-search"
                                                                    id="minBudjet">
                                                                    
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="0"
                                                                        onclick="updateHomeBudgetForHomePage('min', ' 3000','0','');">
                                                                        &#8377;3k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="1"
                                                                        onclick="updateHomeBudgetForHomePage('min', ' 10000','1','');">
                                                                        &#8377;10k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="2"
                                                                        onclick="updateHomeBudgetForHomePage('min', ' 20000','2','');">
                                                                        &#8377;20k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="3"
                                                                        onclick="updateHomeBudgetForHomePage('min', ' 30000','3','');">
                                                                        &#8377;30k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="4"
                                                                        onclick="updateHomeBudgetForHomePage('min', ' 40000','4','');">
                                                                        &#8377;40k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="5"
                                                                        onclick="updateHomeBudgetForHomePage('min', ' 50000','5','');">
                                                                        &#8377;50k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="6"
                                                                        onclick="updateHomeBudgetForHomePage('min', ' 100000','6','');">
                                                                        &#8377;1lakh</div>





                                                                </div>
                                                                <div class="mb-search__min-max webkit__scroll-search"
                                                                    id="maxBudjet"
                                                                    style="display: none; margin-left: 110px;">
                                                                    
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="0" id="maxBhkIndex_0"
                                                                        onclick="updateHomeBudgetForHomePage('max', ' 10000','0','');">
                                                                        &#8377;10k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="1" id="maxBhkIndex_1"
                                                                        onclick="updateHomeBudgetForHomePage('max', ' 20000','1','');">
                                                                        &#8377;20k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="2" id="maxBhkIndex_2"
                                                                        onclick="updateHomeBudgetForHomePage('max', ' 30000','2','');">
                                                                        &#8377;30k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="3" id="maxBhkIndex_3"
                                                                        onclick="updateHomeBudgetForHomePage('max', ' 40000','3','');">
                                                                        &#8377;40k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="4" id="maxBhkIndex_4"
                                                                        onclick="updateHomeBudgetForHomePage('max', ' 50000','4','');">
                                                                        &#8377;50k</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="5" id="maxBhkIndex_5"
                                                                        onclick="updateHomeBudgetForHomePage('max', ' 100000','5','');">
                                                                        &#8377;1lakh</div>
                                                                    <div class="mb-search__min-max__item"
                                                                        data-actualIndex="6" id="maxBhkIndex_6"
                                                                        onclick="updateHomeBudgetForHomePage('max', ' 100000','6','');">
                                                                        &#8377;10lakh</div>






                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="mb-search__btn" type="submit">
                                                        <span class="mb-search__btn__icon"></span> Search
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="clearAll"></div>
                                        </div>
                                    </section>

                                </form>

                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/main-search.blade.php ENDPATH**/ ?>