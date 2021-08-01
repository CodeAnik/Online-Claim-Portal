<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Claim Portal | Nilai University</title>
<style>
        *{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }
    .navbar{
        width: 85%;
        height: 15%;
        margin: auto;
        display: flex;
        align-items:center;
        justify-content:flex-end;
    }
    button{
        background-color: #f4511e;
        border: 2px solid #ffffff;
        border-radius: 20px;
        color: #fcfcfc;
        padding: 10px 25px;
        font-size: 16px;
        outline: none;
        opacity: 0.6;
        transition: 0.5s;
        display: inline-block;
        text-decoration: none;
        cursor: pointer;
    }
    .button:hover {opacity: 1}
    .content{
        color: #FFFFFF;
        position: absolute;
        top: 40%;
        left: 7%;
        transform: translateY(-50%);
        z-index: 2;
    }
     h1{
         font-size: 80px;
         margin: 10px 0 30px;
         line-height: 80px;
     }
     small{
        font-size: 40px;
        margin: 10px 0 30px;
        line-height: 30px;
     }
     /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* Modal End */

    									/* Cover Page Style END */
/*----------------------------------------------------------------------------------------------------- */
    </style>
</head>
<body>
         <div class="content">
             <small>Welcome to <b>Nilai University</b></small>
             <h1><b>Online Claim Website</b></h1>
             <button type="button" class="button"><b><a href="pages/login.php">Take a Tour</a></b></button>
</body>
</html>