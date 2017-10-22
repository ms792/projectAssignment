<html>

<style>

    #navigation li {
        list-style: none;
        display: block;
        float: left;
        margin: 1em;
    }

    #navigation_container {
        margin: 0 auto;
        width: 100%;
    }

    .rectangle {
        background: #e5592e;
        height: 62px;
        position: relative;
        -moz-box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
        box-shadow: 0px 0px 4px rgba(0,0,0,0.55);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        z-index: 500; /* the stack order: foreground */
        margin: 3em 0;
    }


</style>
<body>
<div id="navigation_container">

    <div class="rectangle">

        <ul id="navigation" >
            <li><a href="index.php" >Home Page</a>|</li>
            <li><a href="index.php?pageId=1" >Upload Files</a></li>
            <li><a href="index.php?pageId=2&pageName=<h1>Table%20View</h1>&fileName=uploads/users.csv " >Display Table</a></li>
        </ul>
    </div>


</body>
</html>
