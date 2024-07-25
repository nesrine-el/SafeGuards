if (document.location.href.includes("http://127.0.0.1:8000/earthquake/") ) {

    
    let barre = document.getElementById('barre');
    let mag = parseFloat(barre.dataset.mag);

    let left =  mag * 100 / 9 ;
    console.log('copuyc' + left);
    barre.style.height = "51px";
    barre.style.width = "5px";
    barre.style.backgroundColor = "black";
    barre.style.left = `${left}%`;

}