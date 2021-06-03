const filesData = async() => {
    const data = await fetch('http://127.0.0.1:8000/%28/getfiles')
    const result = await data.json()
    fileTotals.textContent += result.results.total //Tamaño del array
        /* const obj = Object.values(result) */

    //Obtenemos el tipo de archivo

    result.results.data.forEach(file => {

        if (file.fileType.trim() === 'pdf') {
            pdf += 1
        } else if (file.fileType.trim() === 'jpg' || file.fileType.trim() === 'png') {
            image += 1
        } else if (file.fileType.trim() === 'zip' || file.fileType.trim() === 'rar') {
            rar_zip += 1
        } else {
            others += 1
        }
    });
    chartD(pdf, image, others)
    const storageUsed = Object.values(result.results.data)

    totalCapacity(storageUsed)
    totalUserSU(result[0]) //Pasamos las fechas de registro

}
filesData()
const chartD = (pdf = 0, image = 0, others = 0) => {

    countFiles = fileTotals.textContent.split('Files Totals:') //Separamos el string del num
    pdf = pdf / countFiles[1].toString().trim() * 100
    image = image / countFiles[1].toString().trim() * 100
    others = others / countFiles[1] * 100
    rar_zip = rar_zip / countFiles[1].toString().trim() * 100
    const myBarChart = new Chart(chartDoughnut, {
        type: 'doughnut',
        data: {
            labels: ['PDF', 'Image', 'Zip', 'Word,Excel,PP,Etc'],
            datasets: [{
                label: 'My First Dataset',
                data: [pdf, image, rar_zip, others],
                backgroundColor: [
                    'rgb(241, 8, 8)',
                    'rgb(5, 73, 142)',
                    'rgb(5, 142, 140)',
                    'rgb(140, 142, 5)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderWidth: 1,
                hoverOffset: 4
            }]
        }

    });
}

const totalCapacity = async(storageUsed) => {
    const dataR = await storageUsed
    const storageCapacity = parseFloat(dataR[0].capacity)
    dataR.forEach(results => {
        count_capacity_used += parseFloat(results.fileSize)
        count_storage_capacity = parseFloat(results.capacity)
    });
    const capacity = new Chart(myCapacity, {
        type: 'doughnut',
        data: {
            labels: [`Capacity Used: ${count_capacity_used.toFixed(5)} GB`,
                `Total Capacity: ${storageCapacity.toFixed(3)} GB`
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [count_capacity_used.toFixed(5), 14.999],
                backgroundColor: [
                    'rgb(241, 8, 8)',
                    'rgb(5, 142, 7)',

                ],
                borderColor: [
                    'rgb(241, 8, 8)',
                    'rgb(5, 73, 142)',

                ],
                borderWidth: 1,
                hoverOffset: 4
            }]
        }

    });
}


const totalUserSU = (result) => {

    result.forEach(months => {

        let date = months.created_at.split('T')
        let month = date[0].split('-')
        if (parseInt(month[1]) == 1) {
            january += 1
        } else if (parseInt(month[1]) == 2) {
            february += 1
        } else if (parseInt(month[1]) == 3) {
            march += 1
        } else if (parseInt(month[1]) == 4) {
            april += 1
        } else if (parseInt(month[1]) == 5) {
            may += 1
        } else if (parseInt(month[1]) == 6) {
            june += 1
        } else if (parseInt(month[1]) == 7) {
            july += 1
        } else if (parseInt(month[1]) == 8) {
            august += 1
        } else if (parseInt(month[1]) == 9) {
            september += 1
        } else if (parseInt(month[1]) == 10) {
            october += 1
        } else if (parseInt(month[1]) == 11) {
            november += 1
        } else if (parseInt(month[1]) == 12) {
            december += 1
        }


    });



    const total = new Chart(totalUsers, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'

            ],
            datasets: [{
                label: 'Total Sign-Up Users',
                data: [january, february, march, april, may, june, july, august, september, october, november, december],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.12

            }]
        }

    });
}