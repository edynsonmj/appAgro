const conseguirLugares = () =>{
    fetch('https://www.datos.gov.co/resource/g373-n3yy.json')
        .then(response=>response.json())
        .then(lugares =>{
            console.log(lugares)
        })
}
conseguirLugares();