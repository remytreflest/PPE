const map = document.querySelector('#map');
const paths = map.querySelectorAll(".map__image a")
const links = map.querySelectorAll(".map__list a")
const mapButton = document.getElementById("button-to-carte");

// Polyfill du forEach car dans le cas présent on parcours un nodelist et non un tableau et ça ne marche que sur chrome pour l'instant
if (NodeList.prototype.forEach === undefined){
    NodeList.prototype.forEach = function (callback) {
        [].forEach.call(this, callback);
    }
}

// fonction pour mettre en couleur la zone sélectionner et retirer la couleur des autres
var activeArea = function (id) {
    map.querySelectorAll('.is-active').forEach(function (item){
        item.classList.remove('is-active');
    })
    if (id !== undefined){
        document.querySelector('#list-' + id).classList.add('is-active');
        document.querySelector('#region-' + id).classList.add('is-active');
    }
}

paths.forEach(function (path) {
    path.addEventListener('mouseenter', function () {
        var id = this.id.replace('region-', '');
        activeArea(id);
    })
})

links.forEach(function (link){
    link.addEventListener('mouseenter', function(){
        var id = this.id.replace('list-', '');
        activeArea(id);
    })
})

map.addEventListener('mouseover', function (){
    activeArea();
})

mapButton.addEventListener('click', function(e) {
    e.preventDefault();

        map__image.classList.toggle("visible-carte");
        map__list.classList.toggle("visible-carte");
        mapButton.classList.toggle("test3");
        console.log("test")
    
})