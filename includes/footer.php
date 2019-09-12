<!-- JQUERY FIRST -->
<script src="src/js/jquery-2.1.4.js"></script>
<!-- Typed Js -->
<script type="text/javascript" src="src/js/typed.js"></script>
<!-- Progress bar -->
<script src='src/js/nprogress.js'></script>
<!-- wow js-->
<script src="src/js/wow.min.js"></script>
<!-- Materialize Js -->
<script src="src/js/materialize.min.js"></script>
<script>
    <!-- //SMOOTH SCROLL -->
    $(document).on('click', 'a[href*="#"]:not([href="#"])', function(e) {
        if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length && target.selector.indexOf("#top") > -1) {
                $('html, body').animate({
                    scrollTop: (target.offset().top-55)
                }, 1000);
                e.preventDefault();
            }
            else if (target.length && target.selector.indexOf("#top") < 1 && target.selector != '') {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                e.preventDefault();
            }
        }
    });
    // <!--SMOOTH SCROLL-->

    $(document).ready(function() {
        $('select').material_select();
    });

    $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
    });

    new WOW().init();
    $(function(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "request.php?req=products", true);
        xmlhttp.send(null);

        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                products = JSON.parse(this.responseText);
                $(".searching").typed({
                    strings: products,
                    typeSpeed: -8
                });
            }
        }
    });


    $('.searching').on('click', function(e){
        $(this).data('typed').reset();
        $('#search').replaceWith('<div class="autocomplete"><input id="prods" type="text" name="searched"></div>');
        $("#search").focus();
        loadArray();
    });

    $(".value2").change(function(){

        if ($(".value1").val() === $(".value2").val()) {
            $(".value2").css('color','#4caf50');
            $("#confirmed").prop("disabled",false);
        }
        else {
            $(".value2").css('color','#b71c1c');
            $("#confirmed").prop("disabled",true);
        }
    });

    $("#search").focus(function(){
        $(".miaw").removeClass("hide");
    });

    function loadArray(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var prods = JSON.parse(this.responseText);
                autocomplete(document.getElementById("prods"), prods);
            }
        };
        xmlhttp.open("GET", "request.php?req=products", true);
        xmlhttp.send();
    }

    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });
        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }
        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    $(document).ready(function(){
        $('ul.tabs').tabs();
    });

    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });



    $(".baskett").hover(function(){
        $(".baskett").addClass("animated pulse");
    }, function(){
        $(".baskett").removeClass("animated pulse");
    });

    $(window).load(function() { // makes sure the whole site is loaded
        NProgress.start();
        NProgress.inc(0.3);
        NProgress.done();

        $('body').delay(350).css({
            'overflow': 'visible'
        });
    })

</script>
</body>
</html>
