var requestBloodGroup,requestBloodCategory,requestQuantity,requestDate,requestQuantity_error

function onLoad(){
    requestBloodGroup = document.getElementById("rblood-group")
    requestBloodCategory = document.getElementById("rblood-category")
    requestQuantity = document.getElementById("quantity")
    requestDate = document.getElementById("rdate")
    requestQuantity_error = document.getElementById("quantity-error")
    requestDate.valueAsDate = new Date();
    requestDate.readonly = true
}

function getBankIdFromCookie(){
    cookie = document.cookie
    cookie = cookie.split("=")
    return (cookie[0] == 'bankId')?cookie[1]:null
}


function onRequestSubmit(){
    requestQuantity_error.innerText = ''
    if(requestQuantity.value == '' || requestQuantity.value == '0')
        requestQuantity_error.innerText = 'Quantity cannot be 0/empty'
    else{
        let request = new XMLHttpRequest();
        request.open("POST",'./backend/add_request.php',true)
        request.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
        request.send(JSON.stringify({
            "bgroup" : requestBloodGroup.value,
            "category" : requestBloodCategory.value,
            "quantity" : requestQuantity.value,
            "bankId" : getBankIdFromCookie(),
            "date" : requestDate.value
        }))
        request.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            res = Number(this.responseText)
            console.log(res,this.responseText)
              if(res > 0)
                    alert("Request, created succesfully")
              else{ 
                if(res < 0){
                    bankEmailID.focus()
                    document.getElementById('bemail-error').innerText = "User already exists"
                }else
                    alert("Sorry, something went wrong please try again later")
            }
            }
        };
    }
}