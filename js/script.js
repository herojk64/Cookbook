function windowScroll(){
    window.scrollTo(0,600);
}

function contactDirect(){
contactScroll = document.getElementById('contact');
contactScroll.addEventListener('click',function (){
    window.scrollTo(0,99999999);
})
}

function searchEngine(searchVal){
    searchDisplay = document.getElementById('search_display');
    if(searchVal == '' || searchVal == null){
        searchDisplay.innerHTML = '';
        searchDisplay.setAttribute('style','display:none');
        return false;
        
    }else{
    
    $.ajax({
        type:'GET',
        url: './action.php',
        data:{
            search: searchVal
        },
        processData:true,
        success:function(response){

            
          
            searchDisplay.style.display = 'flex';
           searchDisplay.innerHTML ='';
            search = JSON.parse(response);
           for(i=0;i<search.length;i++){

            spa = document.createElement('span');

            z = document.createElement('button');
            z.setAttribute('type','button');
            z.setAttribute('value',search[i].header);
            z.setAttribute("class","se_Value");
            z.setAttribute("onclick","searchSections(this.value)");
            
            z.innerHTML = search[i].header;
            
searchDisplay.append(spa);
spa.append(z);
           }
            
          
            
            
            
        }
    });

}
}


function userRegister(){

            validateEmail= $('#email').val();
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(validateEmail) != true){
                alert('Enter Proper Email');
                return false;
                
            }

            $.ajax({
                type: 'POST',
                url: './action.php',
                data: { 
                        fname : $('#fname').val(),
                        lname : $('#lname').val(),
                        email : $('#email').val(),
                        password : $('#password').val()
                       },
                       processData:true,
                success: function(response){
                    if(response == 'null' || response == '' || response == null){
                        alert('Please Fill All The Content.');
                    }
                
                    if(response == 'Registered'){
                        alert('Email Already Registered');
                    }
                
                    if(response == 'Error'){
                        alert('Connection Error');
                    }
                
                    if(response == 'Complete'){
                        alert('User Registered');
                        window.location.href="../login/#";
                    }
                    return false;
                }
                     });
                    
                 
    
}





function loginCheck(){
    email=$('#email').val();
   
    errorMsg=$('#error_msg');
    
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) != true){
        alert('Enter Proper Email');
        return false;  
    }

    $.ajax({
        type: 'POST',
        url: './login.php',
        data: { 
                email : $('#email').val(),
                password : $('#password').val()
               },
               processData:true,
        success: function(response){
            if(response == 'EmailError' || response == 'PasswordError'){
                alert('Email or Password not received');
            }

            if(response == null || response == '' || response == 'null'){                
                alert('Please Enter Your Password');
            }
            if(response == 'Record_Error'){
                alert('session data error');
            }

            if(response == 'usernotfound' || response == 'nomatch'){
                errorMsg.css('visibility','visible');
                errorMsg.html('Incorrect Username or Password');
            }

            if(response == 'completed'){
                alert('Login Success');
                window.location.href='../#';
            }

            return false;
            
        }
             });
            

}

function adminCheck(){
  
    errorMsg=$('#error_msg');
    

    $.ajax({
        type: 'POST',
        url: './login.php',
        data: { 
                username : $('#username').val(),
                password : $('#password').val()
               },
               processData:true,
        success: function(response){
            console.log(response);
            if(response == 'usernameError' || response == 'PasswordError'){
                alert('Email or Password not received');
            }

            if(response == null || response == '' || response == 'null'){
                errorMsg.css('visibility','visible');
                alert('Please Enter Your Password');
            }
            if(response == 'Record_Error'){
                alert('session data error');
            }

            if(response == 'usernotfound' || response == 'passwordnomatch'){
                errorMsg.css('visibility','visible');
                return false;
            }

            

            if(response == 'completed'){
                alert('Login Success');
                window.location.href='../#';
            }

            return false;
            
        }
             });
            

}


function dispPass(){
    displayPassword=document.getElementById('profile_password');
    value = displayPassword.getAttribute("data-value");
    if(value == "none"){
    displayPassword.style.display ="flex";
    displayPassword.setAttribute("data-value","disp");
    }
    if(value == "disp" ){
        displayPassword.style.display ="none";
        displayPassword.setAttribute("data-value","none");
    }
}

function dispFeed(){
    displayFeed=document.getElementById('feedback_form');
    value1 = displayFeed.getAttribute("data-type");
    
    if(value1 == "none"){
    displayFeed.style.display ="flex";
    displayFeed.setAttribute("data-type","disp");
    }
    if(value1 == "disp" ){
        displayFeed.style.display ="none";
        displayFeed.setAttribute("data-type","none");
    }
}


function changePass(){
    passwordCur = $('#curpassword').val();
    passwordNew = $('#password').val();
    passwordVal = $('#cpassword').val();

    if(passwordCur == null){
        alert('Please Enter Your Current Password');
        return false;
    }

    if(passwordNew == null || passwordVal == null){
        alert('Please Enter New Password');
        return false;
    }

    if(passwordNew != passwordVal){
        alert('Passwords do not match');
        return false;
    }else{
    
        $.ajax({
        type: 'POST',
        url: './change.php',
        data: { 
                curpassword: $('#curpassword').val(),
                password : $('#password').val()
               },
               processData:true,
        success: function(response){
            if(response == 'phaseoneerror'){
                alert('Connection Failed');
            }

            if(response == 'phasetwoerror'){
                alert('second connection failed');
            }

            if(response == 'nocurpass'){
                alert('Current password does not match');
            }

            if(response == 'success'){
                alert('Password changed');
                window.location.href="../#";
            }

            return false;
            
        }
             });

        }
}


function submitFeedback(){
    checkFeedback = $('#feedback').val();
    if(checkFeedback == null){
        alert('Do not Submit Blank Feedback');
        return false;
    }
    $.ajax({
        type: 'POST',
        url: './feedback.php',
        data: { 
                feedback: $('#feedback').val()
               },
               processData:true,
        success: function(response){
            if(response == 'error'){
                console.log('Query failed');
            }

            if(response == 'completed'){
                alert('Submited');
            }

            return false;
            
        }
             });
}

function logOut(){
    window.location.href ="./logout.php";
}

function adminView(){
    window.location.href='./dashboard.php';
}

function adminAddnew(){
    window.location.href='./addnew.php';
}

function adminSelect(){
    var formValue=$('#form_select').val();
    addRecip=document.getElementById('addRecipe');
    addIngredient=document.getElementById('addIngredient');
    value1=addRecip.getAttribute('data-type');
    value2=addIngredient.getAttribute('data-type');
    console.log(value1);
    console.log(value2);
    console.log(formValue);
    if(formValue == 'Recipe'){
        addRecip.setAttribute('data-value',1);
        addIngredient.setAttribute('data-value',2);
    }
    if(formValue == 'Ingredient'){
        addRecip.setAttribute('data-value',2);
        addIngredient.setAttribute('data-value',1);
    }
}

function adminaddIngredient(){
    check=$("input[type='radio'][name='check']:checked").val();
    if(check == "1"){
    $.ajax({
        type: 'POST',
        url: './action.php',
        data: { 
                iname: $('#iname').val()
               },
               processData:true,
        success: function(response){
            
            if(response =='null' || response == null){
                alert('Please Enter Ingredient Name');
            }

            if(response == 'exists'){
                alert('Ingredient Already Existes');
            }

            if(response == 'icomplete'){
                alert('Ingredient Added');
                $('#iname').val()= '' ;
               
            }

            if(response == 'ICF'){
                alert('Ingredient Connection Failed');
            }

            return false;
            
        }
             });
    }
}

function ingSelect(){
    ingvalue = $('#ingSelect').val();
    
}

function showImg(file){
    if(file){
        
        url = URL.createObjectURL(file);
        img = document.getElementById('dispicture');
        img.style.display = 'block';
        img.src = url;
        img.onload = URL.revokeObjectURL(file);
    }
}

function iSearch(x){
   
    $.ajax({
        type:'GET',
        url:'./action.php',
        data:{
            isearch:x
        },
        processData:true,
        success:function(response){
            display = document.getElementById('idisp');
            
            if(response == 'Unsuccessfull'){
                alert('data retrive failed');
                return false;
            }
            search = JSON.parse(response);
            if(search == null){
                display.style.display = "none";
                display.innerHTML = "";
                return false;
            }
            
            display.style.display = "";
            display.style.display="flex";
            display.innerHTML = "";
            for(i=0;i<search.length;i++){
                y = document.createElement('button');
                y.setAttribute('class','ivalue');
                y.setAttribute('onclick','selectIng(this.value);');
                y.setAttribute('type','button');
                y.value = search[i].name;
                y.innerHTML = search[i].name;
                display.append(y);
            
            }
        }
        
    });

}

function selectIng(select){
    selected = document.getElementById('iSelected');
    elem = document.createElement('span');
    
    content = document.createElement('button');
    content.innerHTML = select;
    content.setAttribute('type','button');
    content.value = select;
    content.setAttribute('onclick','this.parentNode.remove()');

    inginput= document.createElement('input');
    inginput.setAttribute('type','number');
    inginput.setAttribute('min','1');
    count = Number(document.getElementById('iSelected').children.length);
    sum = count+1;
    inginput.setAttribute('id','ing'+sum);
    
    selected.append(elem);
    elem.append(content);
    elem.append(inginput);
}

function addRecipe(){
    heading = $('#recipeHeading').val();
    if(heading == null || heading == ''){
        alert('Please enter heading');
        return false;
    }
    cat = $('#category').val();
    if(cat == null || cat == ''){
        alert('Please select category');
        return false;
    }
    min = $('#time').val();
    if(min == null || min == ''){
        alert('Please enter time taken to prepare recipe');
        return false;
    }
    ingval = new Array();
    ing = document.getElementById('iSelected');
    if(ing.children.length == '0'){
        alert('Please Select Ingredients used by recipe');
    }
    for(i=0;i<ing.children.length;i++){
        sum = i+1;
        ingname = document.getElementById('ing'+sum).parentElement.children[0].value;
        ingnumber = $('#ing'+sum).val()

        ingval[i] ={name:ingname,number:Number(ingnumber)};

    }
    ingvalue = JSON.stringify(ingval);
    
    

    details = $('#rdeatils').val();

    

    $.ajax({
        url: 'action.php',
        type: 'post',
        data: {
            head : heading,
            category : cat,
            time : min,
            ingredient: ingvalue,
            detail : details
        },
        processData: true,
        success: function(response){
            if(response == 'Fileerror'){
                alert('file error');
            }
            
            if(response == 'complete'){
                alert('complete');
            }
        }
    });

    file = new FormData();
    img = $('#picture')[0].files[0];
    file.append('picture',img);
    

    $.ajax({
        url:'action.php',
        type:'POST',
        data: file,
        contentType: false,
        cache:false,
        processData:false,
        success:function(data){
            console.log(data);
        }
    });

return false;
}


function editData(heading){
   window.location.href = "./edit.php?header="+heading;
}
function deleteData(deldata){
    $.ajax({
        url: 'delete.php',
        type: 'GET',
        data: {
            header : deldata
        },
        processData: true,
        success: function(response){
            if(response == 'null' || response == null){
                alert('Response Null');
            }
            if(response == 'deleted'){
                alert('Deleted');
                window.location.href='./dashboard.php';
            }
            if(response == 'deleteerror'){
                alert('Delete Failed');
            }
        }
    });
}

function updateRecipe(){
    cheading = $('#checkHeading').val();

    heading = $('#recipeHeading').val();
    if(heading == null || heading == ''){
        alert('Please enter heading');
        return false;
    }
    cat = $('#category').val();
    if(cat == null || cat == ''){
        alert('Please select category');
        return false;
    }
    min = $('#time').val();
    if(min == null || min == ''){
        alert('Please enter time taken to prepare recipe');
        return false;
    }
    ingval = new Array();
    ing = document.getElementById('iSelected');
    if(ing.children.length == '0'){
        alert('Please Select Ingredients used by recipe');
    }
    for(i=0;i<ing.children.length;i++){
        sum = i+1;
        ingname = document.getElementById('ing'+sum).parentElement.children[0].value;
        ingnumber = $('#ing'+sum).val()
        ingval[i] ={name:ingname,number:Number(ingnumber)};

    }
    ingvalue = JSON.stringify(ingval);
    
    

    details = $('#rdeatils').val();

    
   
    img = $('#picture')[0].files[0];
    if(img == null){
        bool = 'false';
    }else{
       file = new FormData();
    file.append('picture',img);
    bool = 'true';
    }

    $.ajax({
        url: 'action.php',
        type: 'post',
        data: {
            chead:cheading,
            uhead : heading,
            ucategory : cat,
            utime : min,
            uingredient: ingvalue,
            udetail : details,
            ubool : bool
        },
        processData: true,
        success: function(response){
            console.log(response);
            
            if(response == 'Fileerror'){
                alert('file error');
            }
            
            if(response == 'complete'){
                alert('complete');
            }
           
        }
    });

if(bool == 'true'){
    $.ajax({
        url:'action.php',
        type:'POST',
        data: file,
        contentType: false,
        cache:false,
        processData:false,
        success:function(data){
            if(data == 'complete'){
                console.log('completed');
            }
        }
    });
}
window.location.href='./dashboard.php';
}



function searchSections(searchedVal){
    window.location.href= "./search/index.php?search="+searchedVal;
}

function recipeEngine(recipeHeader){
    window.location.href="../recipe/index.php?header="+recipeHeader;
}


function recipeBoxRedirect(redirect) {
    window.location.href="./recipe/index.php?header="+redirect;
}

function recipeBoxRedirectdis(redirect) {
    window.location.href="../recipe/index.php?header="+redirect;
}

function readMore(featured){
    window.location.href = "./recipe/index.php?header="+featured;
}

function redirCategory(){
    window.location.href = "./discover/index.php";
}