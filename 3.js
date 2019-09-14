const drawImage = (number) => {
    let charEqual = '=';
    let charAt = '@';
    let output = '';

    if(isOdd(number)) {
        let middleOfNumber =  Math.round(number);
        // WIP
    }
};


const isOdd = (number) => { return number === parseFloat(number) && !!(number % 2)};