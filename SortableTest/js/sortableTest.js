var queryList = document.getElementById("queryList");
var deleteItem = document.getElementById("delete-item-group");


new Sortable(queryList, {
    group: {
        name: 'shared',
        put: false,
        pull: 'clone'
        
    },
    swap: true,
    swapClass: 'highlight',
    animation: 150,

});

new Sortable(deleteItem, {
    group: {
        name: 'deletable',
        put: false,
        pull: 'clone'
        
    },
    swap: true,
    swapClass: 'highlight',
    animation: 150,

});

queryList.addEventListener('end', replaceItem, false);
deleteItem.addEventListener('end', removeItem, false);

function replaceItem(evt){
//    alert('test');
    if(isTargetItem(lastSwapEl)){
        lastSwapEl.remove();
        dragEl.id = "target-slot";
    }
    
};

function isTargetItem(itemToCheck){
    return itemToCheck.id == "target-slot";
    
}

function removeItem(evt){
    if(isTargetItem(lastSwapEl)){
        var targetSlot = document.createElement("div");
        targetSlot.classList.add('empty-item');
        targetSlot.classList.add('item');
        targetSlot.id = 'target-slot';
        lastSwapEl.remove();
        dragEl.parentNode.replaceChild(targetSlot, dragEl);
    }
    
//    dragEl = emptyItem;
    
}

function createTargetSlotSortable(item, index){
    new Sortable(item, {
        group: 'shared',
        animation: 150,
        swap: true,
    });
    new Sortable(item, {
        group: 'deletable',
        animation: 150,
        swap: true,
    });
}

var targets = document.querySelectorAll('*[id^="target-group-slot"]');
targets.forEach(createTargetSlotSortable);
