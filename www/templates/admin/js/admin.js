window.onload = function () {

  let newCategoryBtn = document.querySelector('.newCategoryBtn');


  function getData(obj_form) {
    var hData = {};
    $('input, textarea, select', obj_form).each(function () {
      if (this.name && this.name != '') {
        hData[this.name] = this.value;
        console.log('hData[' + this.name + '] = ' + hData[this.name]);
      }
    });
    return hData;
  }

  if (newCategoryBtn) {
    newCategoryBtn.addEventListener('click', newCategory);
    function newCategory(e) {
      e.preventDefault();
      var postData = getData('.blockNewCategory');
      $.ajax({
        type: 'POST',
        async: true,
        url: "/admin/addnewcat/",
        data: postData,
        dataType: 'json',
        success: function (data) {
          if (data['success']) {
            alert(data['message']);
            $('.newCategoryName').val('');
          } else {
            alert(data['message'])
          }
        }
      });
    }
  }


}
let updateCategorybtn = document.querySelectorAll('.updateCategory__btn');




for (var i = 0; i < updateCategorybtn.length; i++) {


  updateCategorybtn[i].addEventListener('click', function updateCat() {
    let itemId = this.getAttribute('data-id');

    let parentId = document.querySelector('.parentId_' + itemId).value;
    let newName = document.querySelector('.itemName_' + itemId).value;
    let postData = { itemId: itemId, parentId: parentId, newName: newName };

    $.ajax({
      type: 'POST',
      async: true,
      url: "/admin/updatecategory/",
      data: postData,
      dataType: 'json',
      success: function (data) {
        alert(data['message'])
      }
    });
  });
}

/*
** AJAX >> Добовление нового товара
*/
let addProductBtn = document.querySelector('.addProductBtn');
if (addProductBtn) {
  addProductBtn.addEventListener('click', addProduct);
  function addProduct(e) {
    e.preventDefault();
    let itemName = document.querySelector('.newItemName').value;
    let itemPrice = document.querySelector('.newItemPrice').value;
    let itemCat = document.querySelector('.newItemCatId').value;
    let itemDesc = document.querySelector('.newItemDesc').value;

    let postData = { itemName: itemName, itemPrice: itemPrice, itemCat: itemCat, itemDesc: itemDesc };
    $.ajax({
      type: 'POST',
      async: true,
      url: "/admin/addproduct/",
      data: postData,
      dataType: 'json',
      success: function (data) {
        alert(data['message']);
        if (data['success']) {
          $('.newItemName').val('');
          $('.newItemPrice').val('');
          $('.newItemCatId').val('');
          $('.newItemDesc').val('');
        }
      }
    });


  }
}

let updateProductBtn = document.querySelectorAll('.updateProductBtn');
for (var i = 0; i < updateProductBtn.length; i++) {
  updateProductBtn[i].addEventListener('click', function (e) {
    e.preventDefault();
    var itemId = this.getAttribute('data-id');
    var itemName = document.querySelector('.itemName_' + itemId).value;
    var itemPrice = document.querySelector('.itemPrice_' + itemId).value;
    var itemCatId = document.querySelector('.itemCatId_' + itemId).value;
    var itemDesc = document.querySelector('.itemDesc_' + itemId).value;
    var itemStatus = document.querySelector('.itemStatus_' + itemId).checked;
    if (!itemStatus) {
      itemStatus = 1
    } else {
      itemStatus = 0
    }

    var postData = { itemId: itemId, itemName: itemName, itemPrice: itemPrice, itemPrice: itemPrice, itemCatId: itemCatId, itemDesc: itemDesc, itemStatus: itemStatus };

    $.ajax({
      type: 'POST',
      async: true,
      url: "/admin/updateproduct/",
      data: postData,
      dataType: 'json',
      success: function (data) {
        alert(data['message']);
      }
    });
  });
}

let itemStatus = document.querySelectorAll('.itemStatus');

for (var i = 0; i < itemStatus.length; i++) {
  itemStatus[i].addEventListener('change', function () {

    var itemId = this.getAttribute('data-id');
    var status = this.checked;
    if (! status){
      staus = 0;
    } else {
      status = 1;
    }

    let postData = {itemId: itemId, status:status};

    $.ajax({
      type: 'POST',
      async: true,
      url: "/admin/setorderstatus/",
      data: postData,
      dataType: 'json',
      success: function (data) {
        if(! data['success']){
          alert(data['message']);
        }
        
      }
    });
  })

}



let datePaymentBtn = document.querySelectorAll('.datePaymentBtn');

for (var i = 0; i < datePaymentBtn.length; i++) {
  
  datePaymentBtn[i].addEventListener('click', function(){
    var itemId = this.getAttribute('data-id');
    let datePayment = document.querySelector('.datePayment_' + itemId).value;

    let postData = {itemId: itemId, datePayment:datePayment};
    console.log(postData);
    $.ajax({
      type: 'POST',
      async: true,
      url: "/admin/updateorderaatepayment/",
      data: postData,
      dataType: 'json',
      success: function (data) {
        if(! data['success']){
          alert(data['message']);
        }
        
      }
    });
  })
}








