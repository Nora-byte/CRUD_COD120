window.addEventListener('load', ()=>{
    let lon
    let lat
    
    let temperatura = document.getElementById('temperatura')
    let ubicacion = document.getElementById('ubicacion')

    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition( posicion => {
            //console.log(posicion.coords.latitude)
            lon = posicion.coords.longitude
            lat = posicion.coords.latitude

            const url = `https://api.openweathermap.org/data/2.5/weather?q=santiago&lang=es&units=metric&appid=9de497b0a16ad50a10913eb4e25c5602`
            //console.log(url)

            fetch(url)
            .then( response => { return response.json()})
            .then( data =>{
                console.log(data.main.temp)
                let temp = Math.round(data.main.temp)
                temperatura.textContent = `Temperatura Actual: ${temp} °C`
                ubicacion.textContent = `Ciudad Actual: ${data.name}` 
                //console.log(data.name)

            })
            .catch( error => {
                console.log(error)
            })
        })
    }
})