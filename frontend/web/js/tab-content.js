tabSwitch();
var flag = 0;
function tabSwitch () {
    var tabsBox = document.getElementById("tab-content");
    var tabs = tabsBox.getElementsByTagName("li");
    var contentIdvd = document.getElementById("individual-competition");
    var contentTeam = document.getElementById("team-competition");
    var contents = new Array(contentIdvd,contentTeam);

    for (i = 0; i < tabs.length; i++) {
        tabs[i].index = i;
        tabs[i].onclick = function () {
            for (a = 0; a < tabs.length; a++) {
                contents[a].style.display = "none";
                tabs[a].style.background = "#2e8b57";
                tabs[a].style.color = "#ffffff";
            };
            contents[this.index].style.display = "block";
            tabs[this.index].style.background = "#ffffff";
            tabs[this.index].style.color = "#2e8b57";
        };
    };
};