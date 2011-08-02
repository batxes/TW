var tree;
var nodeCount = 0;

window.onload = function() {

    nodeCount = 8;

    tree = new MooTreeControl({
        div: 'mytree',
        mode: 'files',
        grid: true
    },{
        text: 'Mi Lista',
        open: true
    });

    tree.insert({
        text:'Carnes',
        id:'1'
    });
    tree.insert({
        text:'Pescados',
        id:'2'
    });
    tree.insert({
        text:'Verduras',
        id:'3'
    });
    tree.insert({
        text:'Frutas',
        id:'4'
    });
    tree.insert({
        text:'Cereales',
        id:'5'
    });
    tree.insert({
        text:'Congelados',
        id:'6'
    });
    tree.insert({
        text:'Lacteos',
        id:'7'
    });
    tree.insert({
        text:'Verduras',
        id:'8'
    });
}

function getNodeCount (){
    return nodeCount;
}

function decreaseNodeCount(){
    return nodeCount--;
}

function increaseNodeCount(){
    return nodeCount++;
}

function getTreeValues(){
    var arbolProductos = new Array();
    var nodo;
    for(i = 9;i <= getNodeCount();i++){
        nodo = tree.get( i );
        if(nodo)
            arbolProductos.push(nodo.text);
    }

//    jQuery.ajax('http://locallhost/PHP/getProductos.php',{
//        complete: function(jqXHR, status){
//
//        }
//    })
//
//    document.cookie = "productos="+arbolProductos;
    return arbolProductos;
}

function InsertarProducto() {
    increaseNodeCount();
    //	var node = tree.get( $('nodeid_input').value );
    var categoria;
    categoria = document.lista.categoria[document.lista.categoria.selectedIndex].value;
    var node = tree.get(categoria);
    tree.select(node);
    //	window.alert( node ? 'found: ' + node.text : 'not found...' );
    producto = document.lista.producto[document.lista.producto.selectedIndex].value;
    if (tree.selected && producto!="-") tree.selected.insert({
        text:producto, id:getNodeCount()
    });
    return false
}
function BorrarProducto(){
//    alert("tree.selected = "+tree.index[id]);
//    alert("tree.selectedIndex = "+tree.index.toString());
    //alert("tree.selectedIndex = "+tree.selectedIndex.toString());
    if (tree.selected && tree.selected.id != 1
                      && tree.selected.id != 2
                      && tree.selected.id != 3
                      && tree.selected.id != 4
                      && tree.selected.id != 5
                      && tree.selected.id != 6
                      && tree.selected.id != 7
                      && tree.selected.id != 8) tree.selected.remove();
    
    return false;
}
function find_node() {

    var node = tree.get( $('nodeid_input').value );
    //        var categoria;
    //        categoria = document.lista.categoria[document.lista.categoria.selectedIndex].value;
    //        var node = tree.get(categoria);
    //        tree.select(node);
    window.alert( node ? 'found: ' + node.text : 'not found...' );
//        producto = document.lista.producto[document.lista.producto.selectedIndex].value;
//        if (tree.selected && producto!="-") tree.selected.insert({text:producto});return false
}

var productos_1=new Array("-")
var productos_2=new Array("-")
var productos_3=new Array("-")
var productos_4=new Array("-")
var productos_5=new Array("-")
var productos_6=new Array("-")
var productos_7=new Array("-")
var productos_8=new Array("-")
var ostia = new Array("-","Coliflor","Tomate","Patata","Judias Verdes");

function cambiaProductos(productos){

    var categoria;
    var array = new Array();
    array = productos[0].split("#");
    array.pop(); //para quitar ultimo espacio
    productos_1 = array;
    array = productos[1].split("#")
    array.pop();
    productos_2 = array;
    array = productos[2].split("#")
    array.pop();
    productos_3 = array;
    array = productos[3].split("#")
    array.pop();
    productos_4 = array;
    array = productos[4].split("#")
    array.pop();
    productos_5 = array;
    array = productos[5].split("#")
    array.pop();
    productos_6 = array;
    array = productos[6].split("#")
    array.pop();
    productos_7 = array;
    array = productos[7].split("#")
    array.pop();
    productos_8 = array;

    categoria = document.lista.categoria[document.lista.categoria.selectedIndex].value
    if (categoria != 0) {
        mis_productos=eval("productos_" + categoria)
        num_productos = mis_productos.length
        document.lista.producto.length = num_productos
        for(i=0;i<num_productos;i++){
            document.lista.producto.options[i].value=mis_productos[i]
            document.lista.producto.options[i].text=mis_productos[i]
        }
    }else{
        //si no había provincia seleccionada, elimino las provincias del select
        document.lista.producto.length = 1
        //coloco un guión en la única opción que he dejado
        document.lista.producto.options[0].value = "-"
        document.lista.producto.options[0].text = "-"
    }
    //marco como seleccionada la opción primera de provincia
    document.lista.producto.options[0].selected = true
}