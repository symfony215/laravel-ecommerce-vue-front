<?php 
if (empty ($logo)){?>
  <img id="imgfalg" src="{{ Storage::url('/products/No_Image.jpg') }}"   >   
<?php
}else{ ?>    
  <img  id="imgfalg" src="{{ Storage::url($logo) }}" id="imgfalg"> 
<?php
 }
 ?> 




  <style type="text/css">
  	
#imgfalg{
    width: 50px;
    height: 50px;
    border-radius: 50%;  
    display: block;
    /* text-align: center; */
    margin: auto;
 
}
 </style>

 