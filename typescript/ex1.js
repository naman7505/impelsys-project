var NewCar = /** @class */ (function () {
    function NewCar(engine) {
        if (engine === void 0) { engine = "empty"; }
        this.engine = engine;
        console.log("constructor invoked");
    }
    NewCar.prototype.disp = function () {
        console.log("Engine is: " + this.engine);
    };
    return NewCar;
}());
var obj1 = new NewCar("Maruti Zen");
obj1.disp();
var obj2 = new NewCar("Swift");
obj2.disp();
