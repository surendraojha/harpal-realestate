
            <div class="row mb-3 justify-content-end">

                <div class="col-md-3">
                    <form action="{{ $route }}" method="get">

                        <div class="fieldBox d-flex align-items-center">
                            <span for="" style="white-space: nowrap; font-size: 14px;">
                                Sort By
                            </span>

                            <x-sort-search :order="$order" />

                        </div>

                    </form>

                </div>

            </div>
