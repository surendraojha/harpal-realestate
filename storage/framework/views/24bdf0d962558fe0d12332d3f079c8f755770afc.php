<script src="<?php echo e(asset('front/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/plugins/bootstrap/js/popover.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/plugins/niceselect/jquery.nice-select.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/plugins/slider/swiper.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/js/select.min.js')); ?>"></script>
<script src="<?php echo e(asset('front/assets/js/datepicker/theme/js/t-datepicker.min.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    //js lazyload on image tag
    document.addEventListener("DOMContentLoaded", function() {
        var lazyloadImages;

        if ("IntersectionObserver" in window) {
            lazyloadImages = document.querySelectorAll(".lazy");
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        image.src = image.dataset.src;
                        image.classList.remove("lazy");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function(image) {
                imageObserver.observe(image);
            });
        } else {
            var lazyloadThrottleTimeout;
            lazyloadImages = document.querySelectorAll(".lazy");

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function() {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function(img) {
                        if (img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                        }
                    });
                    if (lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        }
    })
    //js only for home stay page
    //     new SlimSelect({
    //   select: '.customLocation'
    // });
</script>

<script src="<?php echo e(asset('toaster.min.js')); ?>"></script>

<script type="text/javascript">
    <?php if(\Session::has('message')): ?>
        toastr.success("<?php echo e(\Session::get('message')); ?>");
    <?php endif; ?>

      <?php if(\Session::has('status')): ?>
        toastr.success("<?php echo e(\Session::get('status')); ?>");
    <?php endif; ?>
    <?php if($errors->any()): ?>

        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($e); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(\Session::has('error')): ?>
        toastr.error("<?php echo e(\Session::get('error')); ?>");
    <?php endif; ?>
</script>



<script>
    $('.select2').select2({

        tags: true,
        allowClear: true,
        placeholder:"Select or search rental type"
    });

 $('#location_id').select2({

        tags: true,
        allowClear: true,
        placeholder:"Select or search your location",
        maximumSelectionLength: 1
    });




</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>
    //script for sticky header
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;

        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        }
    const swiper = new Swiper('#testSlider', {
        // Optional parameters
        loop: false,
        slidesPerView: 4,
        spaceBetween: 30,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
    $('.ckeditor').ckeditor();





    function like(id) {
        // alert(id);

        var url = "<?php echo e(url('like-support-forum')); ?>/" + id;

        $.ajax({
            type: 'GET',
            url: url,

            success: function(data) {
                // console.log(data);
                // alert(data);
                $('#like-' + id).html(data.like);

            }
        });
    }
</script>
<script type="text/javascript">
    function loadJS(file) {
        var jsElm = document.createElement("script");
        jsElm.type = "application/javascript";
        jsElm.src = file;
        document.body.appendChild(jsElm);
    }
    function loadExtJS(){
        loadJS("https://cdn.staticmb.com/magicservicestatic/1653043917560/js/mb-home-web.js");
        setTimeout(function(){
            loadTracking();
        }, 3500);
    }

    function loadTracking(){
        var _comscore = _comscore || [];
        _comscore.push({
            c1: "2",
            c2: "6036484"
        });
        (function () {
            var s = document.createElement("script"),
            el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "http://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();

        loadJS("https://www.google-analytics.com/analytics.js");


        /*--Start of Zendesk Chat Script--*/
        if(isNRI == 'Y'){
            let myScript = document.createElement("script");
            myScript.setAttribute("id", "ze-snippet");
            myScript.setAttribute("src", "https://static.zdassets.com/ekr/snippet.js?key=0a1546fa-b1f0-46eb-9400-f08b4f00549b");
            document.body.appendChild(myScript);
        }
        /*--End of Zendesk Chat Script--*/

        /** DO NOT MODIFY THIS CODE**/
        /* !function(_window, _document) {

            var OB_ADV_ID = '00590cbab5fc4b17dffdf3bbe9ebc24e4a';

            if (_window.obApi) {
                var toArray = function(object) {

                    return Object.prototype.toString.call(object) === '[object Array]' ? object : [object];

                };

                _window.obApi.marketerId =

                toArray(_window.obApi.marketerId).concat(toArray(OB_ADV_ID));

                return;
            }

            var api = _window.obApi = function() {

                api.dispatch ? api.dispatch.apply(api, arguments) : api.queue.push(arguments);

            };
            api.version = '1.1';
            api.loaded = true;
            api.marketerId = OB_ADV_ID;
            api.queue = [];

            var tag = _document.createElement('script');

            tag.async = true;

            tag.src = '//amplify.outbrain.com/cp/obtp.js';
            tag.type = 'text/javascript';

            var script = _document.getElementsByTagName('script')[0];
            script.parentNode.insertBefore(tag, script);

        }(window, document);
        obApi('track', 'PAGE_VIEW'); */

    }
    $(".locationsearch,.dashLocation").select2({
    placeholder: "Search For Location",
    allowClear: true
});
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "flex";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>



<script src="<?php echo e(asset('front/assets/js/scripts.js')); ?>"></script>


<?php if (isset($component)) { $__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UnselectVideoScript::class, []); ?>
<?php $component->withName('unselect-video-script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d)): ?>
<?php $component = $__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d; ?>
<?php unset($__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d); ?>
<?php endif; ?>



<?php echo $__env->yieldContent('script'); ?>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/layouts/scripts.blade.php ENDPATH**/ ?>