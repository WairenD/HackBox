class Item {
    constructor(queryText, id) {
        this.id = id;
        this.queryText = queryText;
        var container = $("#item-list");
        this.htmlItem = $('<div/>', {
            id: this.id,
            class: "querylist-item item"
        });
        
        container.append(this.htmlItem);
        //this.htmlItem = document.createElement("div");
        //this.htmlItem.className = "querylist-item";
        //this.htmlItem.className += " item";
        //this.htmlItem.data(this); 
        
        //container.append(this.htmlItem);

        this.queryTextDiv = document.createElement("div");
        this.queryTextDiv.className = "item-text";
        this.queryTextDiv.innerHTML = queryText;
        this.htmlItem.append(this.queryTextDiv);

        this.deleteButton = document.createElement("BUTTON");
        this.deleteButton.innerHTML = "X";
        this.deleteButton.className = "item-text";
        this.deleteButton.className += " delete-item";
        this.deleteButton.type = "button";
        this.htmlItem.append(this.deleteButton);
        

        this.htmlItem.data(this);
    }

    

    

    


}