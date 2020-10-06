window.onload = function () {

    function ajax(url, method, functionName, data) {
        let request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                functionName(this.response);
            }
        }

        request.open(method, url, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(data);
    }

    // Авторизация пользователя >>
    let login_btn = document.querySelector(".login__btn");

    login_btn.addEventListener('click', function (e) {
        e.preventDefault();

        var email = document.querySelector('.login__email').value;
        var pwd = document.querySelector('.login__pwd').value;
        var postData = "email=" + email + "&pwd=" + pwd;

        ajax('/user/login/', 'POST', login, postData);
        function login(data) {
            data = JSON.parse(data);
            if (data.success) {
                $('.block-registration').hide();
                $('.user__privat').attr('href', '/user/');
                $('.user__privat').html(data['displayName']);
                $('.block-user').show();


                $('#name').val(data['name']);
                $('#phone').val(data['phone']);
                $('#adress').val(data['adress']);
                $('.btnSaveOrder ').show();
            } else {
                alert(data.message);
            }
        }
    });

    // Регистрация пользователя >>
    let register_btn = document.querySelector(".registration-form__btn");
    // register_btn.addEventListener("click", function (e) {
    //     e.preventDefault();
    //     var phone = $('.registration-form__input[name="phone"]').val();
    //     var adress = $('.registration-form__input[name="adress"]').val();
    //     var pwd1 = $('.registration-form__input[name="pwd1"]').val();
    //     var pwd2 = $('.registration-form__input[name="pwd2"]').val();
    //     var name = $('.registration-form__input[name="name"]').val();
    //     var email = $('.registration-form__input[name="email"]').val();
    //     var postData = "email=" + email + "&pwd1=" + pwd1 + "&pwd2=" + pwd2 + "&phone=" + phone + "&adress=" + adress + "&name=" + name;

    //     ajax('/user/register/', 'POST', register, postData);
    //     function register(data) {
    //         data = JSON.parse(data);

    //         if (data.success) {
    //             alert(data.message);
    //             $('.block-registration').hide();
    //             $('.user__privat').attr('href', '/user/');
    //             $('.user__privat').html(data.userName);
    //             $('.block-user').show();
    //             $('.btnSaveOrder').show();
    //         } else {
    //             alert(data.message);
    //         }
    //     }
    // });




    if (register_btn) {
        register_btn.addEventListener("click", register);
        function getData(obj_form) {
            let hData = {};
            $('input, textarea, select', obj_form).each(function () {
                if (this.name && this.name != '') {
                    hData[this.name] = this.value;
                    // console.log('hData[' + this.name + '] = ' + hData[this.name]);
                }
            });
            return hData;
        };
        function register(e) {
            e.preventDefault();
            let postData = getData('.registration-form');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/user/register/",
                data: postData,
                dataType: 'json',
                success: function (data) {
                    if (data['success']) {
                        alert(data['message']);
                        $('.block-registration').hide();
                        $('.user__privat').attr('href', '/user/');
                        $('.user__privat').html(data['userName']);
                        $('.block-user').show();

                        $('.btnSaveOrder').show();
                    } else {
                        alert(data['message']);
                    }
                }
            });
        }
    }


    // Добавление товара в карзину >>
    let addCart = document.querySelector(".addCart");
    if (addCart) {
        addCart.addEventListener("click", addCar);

        function addCar(event) {
            event.preventDefault();
            var dataId = this.getAttribute("data-id");
            $.ajax({
                type: 'POST',
                async: true,
                url: "/cart/addtocart/" + dataId + '/',
                dataType: 'json',
                success: function (data) {
                    if (data['success']) {
                        $('#cartCntItems').html(data['cntItems']);
                        $('.addCart').hide();
                        $('.removeCart_' + dataId).show();
                    }
                }
            });
        }
    }



    // Удаление товара из карзины >>
    let removeCart = document.querySelectorAll(".removeCart"); // Получаем все ссылки class = "removeCart"
    let itemCnt = document.querySelectorAll(".itemCnt"); // Получаем все ссылки class = "removeCart"
    for (var i = 0; i < removeCart.length; i++) {
        removeCart[i].addEventListener("click", removeFromCart);
    }

    for (var i = 0; i < itemCnt.length; i++) {
        itemCnt[i].addEventListener("input", conversionPrice);
    }

    function removeFromCart(event) {
        event.preventDefault();
        var dataId = this.getAttribute("data-id");
        $.ajax({
            type: 'POST',
            async: true,
            url: "/cart/removefromcart/" + dataId + "/",
            dataType: 'json',
            success: function (data) {
                if (data['success']) {
                    $('#cartCntItems').html(data['cntItems']);

                    $('.removeCart_' + dataId).hide();
                    $('.addCart_' + dataId).show();
                }
            }
        });
    }

    // Подсчет стоимости купленного товара >>
    function conversionPrice() {
        let dataId = this.getAttribute("data-id");
        let newCnt = $('.itemCnt_' + dataId).val();
        let itemPrice = $('.itemPrice_' + dataId).attr('value');
        var itemRealPrice = newCnt * itemPrice;
        $('.itemRealPrice_' + dataId).html(itemRealPrice);
    }
    // Изминение данных пользователя >>
    $(".user_acount__btn").click(function () {

        var phone = $('.newPhone').val();
        var adress = $('.newAdress').val();
        var pwd1 = $('.newPwd1').val();
        var pwd2 = $('.newPwd2').val();
        var curPwd = $('.curPwd').val();
        var name = $('.newName').val();

        var postData = {
            phone: phone,
            adress: adress,
            name: name,
            pwd1: pwd1,
            pwd2: pwd2,
            curPwd: curPwd,

        };
        $.ajax({
            type: 'POST',
            async: true,
            data: postData,
            url: "/user/update/",
            dataType: 'json',
            success: function (data) {
                if (data['success']) {
                    $('.userLink').html(data['userName']);
                    alert(data['message']);

                } else {
                    alert(data['message']);

                }
            }
        });
    });

    // Показ и скрытие формы регистрации >>

    var register_toggle = document.querySelector('.link-toggle');
    var register_form = document.querySelector('.registration-form');
    if (register_toggle) {
        register_toggle.addEventListener('click', function () {

            register_form.classList.toggle('show');

        })
    }

    // Сохранение заказа >>

    let btnSaveOrder = document.querySelector(".btnSaveOrder");
    function getData(obj_form) {
        let hData = {};
        $('input, textarea, select', obj_form).each(function () {
            if (this.name && this.name != '') {
                hData[this.name] = this.value;
                console.log('hData[' + this.name + '] = ' + hData[this.name]);
            }
        });
        return hData;
    };
    if (btnSaveOrder) {
        btnSaveOrder.addEventListener('click', saveOrder);
        function saveOrder(e) {
            e.preventDefault();
            var postData = getData('form');
            $.ajax({
                type: 'POST',
                async: false,
                url: "/cart/saveorder/",
                data: postData,
                dataType: 'json',
                success: function (data) {
                    if (data['success']) {
                        alert(data['message']);
                        document.location = '/';
                    } else {
                        alert(data['message'])
                    }
                }
            });
        }

    }







}

