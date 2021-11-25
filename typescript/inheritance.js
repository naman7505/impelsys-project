var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
//Paren Class
var Person = /** @class */ (function () {
    function Person(pName, age) {
        this.pName = pName;
        this.age = age;
    }
    return Person;
}());
//Child class
var Employee = /** @class */ (function (_super) {
    __extends(Employee, _super);
    function Employee(pName, age, eSalary, isActive) {
        var _this = _super.call(this, pName, age) || this;
        _this.eSalary = eSalary;
        _this.isActive = isActive;
        return _this;
    }
    Employee.prototype.getNetSalary = function () {
        var netsal;
        if (this.isActive == true) {
            if (this.eSalary < 10000) {
                netsal = this.eSalary - (this.eSalary * 10 / 100);
            }
            else {
                netsal = this.eSalary - (this.eSalary * 15 / 100);
            }
        }
        else {
            netsal = 0;
        }
        return netsal;
    };
    return Employee;
}(Person));
var employees = [
    new Employee("Ayush Kesarwani", 25, 6000, true),
    new Employee("Abhishek Patel", 28, 14000, true),
    new Employee("Aqib", 23, 16000, true),
    new Employee("Pratyush", 24, 8000, true)
];
employees.push(new Employee("Abhishek", 21, 18000, true));
console.log("Print all the value using for loop...");
console.log("\n");
for (var i = 0; i <= (employees.length - 1); i++) {
    console.log("Person : " + (i + 1));
    console.log("Person Name: " + employees[i].pName);
    console.log("Age: " + employees[i].age);
    console.log("Salary: " + employees[i].eSalary);
    console.log("Activity: " + employees[i].isActive);
    console.log("Net Salary: " + employees[i].getNetSalary());
    console.log("\n");
}
