class Item {
    constructor(queryText, id) {
        this.id = id;
        var container = document.getElementById("item-list");
        this.htmlItem = document.createElement("div");
        this.htmlItem.className = "querylist-item";
        this.htmlItem.className += " item";
        container.appendChild(this.htmlItem);

        this.queryTextDiv = document.createElement("div");
        this.queryTextDiv.className = "item-text";
        this.queryTextDiv.innerHTML = queryText;
        this.htmlItem.appendChild(this.queryTextDiv);

        this.deleteButton = document.createElement("BUTTON");
        this.deleteButton.innerHTML = "X";
        this.deleteButton.className = "item-text";
        this.deleteButton.className += " delete-item";
        this.htmlItem.appendChild(this.deleteButton);
        this.setVisibilityDeleteButton(false);
        
        
    }

    

    setVisibilityDeleteButton(boolean) {
        if (boolean) {
            this.deleteButton.style.visibility = "visible";
        } else {
            this.deleteButton.style.visibility = "hidden";
        }
        
    }

    


}