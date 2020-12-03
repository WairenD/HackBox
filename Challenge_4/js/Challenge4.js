var queryArray = ["&quot;)", "&quot;(", "1 = 1", ";--", "AND", "OR"];


var funcs = [];
var items = new Array();
for (i = 0; i < queryArray.length; i++) {
    var item = new Item(queryArray[i], i);
    items.push(item);
    setVisibilityDeleteButton(false, item.deleteButton);

    funcs[i] = (function (item) {
        return function () { removeItem(item, true); };
    }(item));
    item.deleteButton.addEventListener("click", funcs[i]);
}


var queryList = document.getElementById("item-list");
var targets = document.querySelectorAll('*[class^="target-group-slot"]');
targets.forEach(createTargetSlotSortable);

new Sortable(queryList, {
    group: {
        name: 'shared',
        put: false,
    },
    swap: true,
    animation: 150
});

function removeItem(item, replace) {
    var newItem = new Item(item.queryText, item.id);
    newItem.deleteButton.addEventListener("click", function (newItem) {
        return function () { removeItem(newItem, true); };
    }(newItem));
    setVisibilityDeleteButton(false, newItem.deleteButton);
    console.log(replace);
    console.log(item.htmlItem);
    if (replace) {
        item.htmlItem.replaceWith($('<div/>', {
            class: "target-slot item"
        }));
    }
    
    
}


function createTargetSlotSortable(item, index) {
    new Sortable(item, {
        group: 'shared',
        animation: 150,
        swap: true,
    });
}

queryList.addEventListener('end', replaceItem, false);


function replaceItem(evt) {
    if (isTargetItem(lastSwapEl) == 1) {
        var draggedItem = $("#" + dragEl.id);
        lastSwapEl.remove();
        dragEl.classList.add("target-item");
        setVisibilityDeleteButton(true, draggedItem.data().deleteButton);
    } else if (isTargetItem(lastSwapEl) == 2) {
        removeItem(items[lastSwapEl.id], false);
        var draggedItem = $("#" + dragEl.id);
        
        lastSwapEl.remove();
        dragEl.classList.add("target-item");
        setVisibilityDeleteButton(true, draggedItem.data().deleteButton);
    }
};

function isTargetItem(itemToCheck) {
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




