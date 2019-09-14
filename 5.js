const drawLine = (column) => {
    let output = "";

    for (let i = 0; i <= column ; i++) {
        for (let x = 0; x <= column ; x++) {
            output = i === x ? output.concat("*") : output = output.concat(" ");
        }
        output = output.concat("\n");
    }

    console.log(output);
};

drawLine(1);