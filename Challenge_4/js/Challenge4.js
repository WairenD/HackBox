//List of query items the user can use
var queryArray = ["&quot;)", "&quot;(", "1 = 1", ";--", "AND", "OR"];

//setup query items
var funcs = [];
var items = new Array();
for (i = 1; i <= queryArray.length; i++) {
    var item = new Item(queryArray[i - 1], i);
    items.push(item);
    setVisibilityDeleteButton(false, item.deleteButton);
    //setup delete button for each item
    funcs[i] = (function (item) {
        return function () { removeItem(item, true); };
    }(item));
    item.deleteButton.addEventListener("click", funcs[i]);
}

//make the user able to drag items into the target area
var queryList = document.getElementById("item-list");
var targets = document.querySelectorAll('*[class^="target-group-slot"]');
targets.forEach(createTargetSlotSortable);

//Make query items sortable and draggable
new Sortable(queryList, {
    group: {
        name: 'shared',
        put: false,
    },
    swap: true,
    animation: 150
});

//Make target items sortable and draggable
function createTargetSlotSortable(item, index) {
    new Sortable(item, {
        group: 'shared',
        animation: 150,
        swap: true,
    });
}

//Add event listeners for when a query items gets dragged
queryList.addEventListener('end', replaceItem, false);

//Make delete buttons on items functionable
function removeItem(item, makeEmpty) {
    //store old data of the item into a new item so it can reappear in the list
    var newItem = new Item(item.queryText, item.id);
    newItem.deleteButton.addEventListener("click", function (newItem) {
        return function () { removeItem(newItem, true); };
    }(newItem));
    setVisibilityDeleteButton(false, newItem.deleteButton);

    //if true the target slot will be an empty target slot
    if (makeEmpty) {
        item.htmlItem.replaceWith($('<div/>', {
            class: "target-slot item"
        }));
    }
    
    
}

function replaceItem(evt) {
    if (typeOfTargetItem(lastSwapEl) == 1 || typeOfTargetItem(lastSwapEl) == 2) {
        //Target item is a target slot
        var draggedItem = $("#" + dragEl.id);
        lastSwapEl.remove();
        dragEl.classList.add("target-item");
        setVisibilityDeleteButton(true, draggedItem.data().deleteButton);
    }
    if (typeOfTargetItem(lastSwapEl) == 2) {
        //Target item is a filled target slot
        removeItem(items[(lastSwapEl.id - 1)], false);
    }
};

function typeOfTargetItem(itemToCheck) {
    if (itemToCheck.classList.contains("target-slot")) {
        return 1;
    } else if (itemToCheck.classList.contains("target-item")) {
        return 2;
    } else {
        return 0;
    }
    
}

function setVisibilityDeleteButton(boolean, deleteButton) {
    if (boolean) {
        deleteButton.style.visibility = "visible";
    } else {
        deleteButton.style.visibility = "hidden";
    }

}

function submitAnswer() {
    var cookieString = "submit=";
    for (i = 0; i < targets.length; i++) {
        console.log(targets[i].children[0].id);
        cookieString += targets[i].children[0].id;
    }
    console.log(cookieString);
    document.cookie = cookieString;
    window.location.reload(true)
}




