var queryArray = ["&quot;)", "&quot;(", "1 = 1", ";--", "AND", "OR"];
for (i = 0; i < queryArray.length; i++) {
    new Item(queryArray[i], i);
}




var queryList = document.getElementById("item-list");

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

queryList.addEventListener('end', replaceItem, false);

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

