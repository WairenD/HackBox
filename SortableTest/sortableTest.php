<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Big Brain Inc.</title>
        <link href="css/sortableTest.css" type="text/css" rel="stylesheet"/>
        <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
        <script src="js/sortable.complete.esm.js"></script>
    </head>
    <body>
        <div id="queryList" class="queryList-group">
            <div class="queryList-item item"><p>WHERE id=</p></div>
            <div class="queryList-item item"><p>'hacker'</p></div>
            <div class="queryList-item item"><p>FROM users</p></div>
            <div class="queryList-item item"><p>SELECT *</p></div>
        </div>
        
        <div id="delete-item-group">
            <div class="delete-item item" id="delete-item"><p>X</p></div>
        </div>
        
        <div class="buffer"></div>
        
        <div id="target-group" class="target-group">
            <div id="target-group-slot" class="target-group-slot">
                <div class='empty-item item' id="target-slot"></div>
            </div>
            <div id="target-group-slot" class="target-group-slot">
                <div class='empty-item item' id="target-slot"></div>
            </div>
            <div id="target-group-slot" class="target-group-slot">
                <div class='empty-item item' id="target-slot"></div>
            </div>
            <div id="target-group-slot" class="target-group-slot">
                <div class='empty-item item' id="target-slot"></div>
            </div>
        </div>
        
       <script type="text/javascript" src="js/sortableTest.js"></script>
    </body>
</html>

