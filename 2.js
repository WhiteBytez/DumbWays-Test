const userNameValidation = (username) => {
    let result;
    let regexRules = /^(?=^[a-zA-Z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,9}/;
    return result = !!username.match(regexRules);
};

const passwordValidation = (password) => {
    let result;
    let regexRules = /(?=.*[A-Z])(?=.*\d)(?=.*@)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/;
    return result = !!password.match(regexRules);
};

console.log(userNameValidation('@Najibb')); // will return false
console.log(userNameValidation('Ayu99v')); // will return true

console.log(passwordValidation('p@ssW0rd#')); // will return true
console.log(passwordValidation('DumbW4ysDev99!#')); // will return false
