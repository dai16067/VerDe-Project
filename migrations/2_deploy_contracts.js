var Contract = artifacts.require("StudentGrades.sol");
module.exports = function(deployer) {
    deployer.deploy(Contract);
}