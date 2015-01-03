<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
#lobbycontainer{
    width: 580px;
    height: 330px;
    background-color: #042100;
    position: relative;
    }
#tabscontainer{
    position: relative;
    height: 45px;
    width: 580px;
    background-color: #052101;
    }
#tabscontainer ul{
    list-style-type: none;
    margin: 0px;
    padding: 0;
    height: 48px;
    position: absolute;
    margin-top:22px;
    width:500px;
    margin-left:20px;
    }
#tabscontainer li{
    padding-top: 5px;
    padding-bottom: 0px;
    padding-left: 30px;
    padding-right: 30px;
    display: inline;
    background-color: #222222;
    border: 2px solid #51B8EF;
    border-bottom: none;
    margin-left: -15px;
    width: 60px;
    border-bottom-left-radius: 8px;
    border-top-right-radius: 10px;
    border-top-left-radius:10px;
    }    
#tabscontainer a{
    text-decoration: none;
    font-variant: small-caps;
    font-size: 20px;
    text-align: center;
    color:#23B9E4;
    }         
#tabscontainer a:hover{
    color:#FFFCFD;
    }
#topoftable{
    width: 576px;
    height: 40px;
    background-color: #222222;
    border-left: 2px solid #51B8EF;
    border-right: 2px solid #51B8EF;
    border-top: 2px solid #51B8EF;
    border-top-right-radius: 20px;
    border-top-left-radius: 20px;
    }
    
#tablecontainer{
    width: 580px;
    height: 204px;
    background-color: #013102;
    overflow-y: scroll;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    border-right: 2px solid #51B8EF;
    border-left: 2px solid #51B8EF;
    }
.roweven{
    width: 576px;
    height: 40px;
    background-color: #163620;
    }
.rowodd{
    width: 576px;
    height: 40px;
    background-color: #112C1A;
    }
#lobbybottomarea{
    height: 36px;
    width: 576px;
    background-color: #222222;
    position: relative;
    border-bottom: 2px solid #51B8EF;
    border-left: 2px solid #51B8EF;
    border-right: 2px solid #51B8EF;
    border-bottom-right-radius: 20px;
    border-bottom-left-radius: 20px;
    }                
#firsttab{
    width: 60px;
    height: 25px;
    position: relative;
    display: inline;
    background-color: #E00F0F;
    top: 20px;
    }
.middletabs{
    width: 60px;
    height: 25px;
    position: relative;
    display: inline;
    background-color: #FDF9F9;
    top: 20px;
    margin-left:-5px;
    
    }
#lasttab{
    width: 60px;
    height: 25px;
    position: relative;
    display: inline;
    background-color: #FDF9F9;
    top: 20px;
    }    

</style>
</head>

<body>

<div id="lobbycontainer">



<div id="tabscontainer">
<ul>
    <li><a href="#">suicide</a></li>
    <li><a href="#">heads up</a></li>
    <li><a href="#">weekly</a></li>
    <li><a href="#">season</a></li>
</ul>
</div><!--tabscontainer-->

<div id="topoftable">
</div><!--topoftable-->

<div id="tablecontainer">
    <div class="roweven"></div>
    <div class="rowodd"></div>
    <div class="roweven"></div>
    <div class="rowodd"></div>
    <div class="roweven"></div>
    <div class="rowodd"></div>
    <div class="roweven"></div>
    <div class="rowodd"></div>
</div><!--tablecontainer-->

<div id="lobbybottomarea"></div><!--bottomarea-->


</div><!--lobbycontainer-->
</body>
</html>

