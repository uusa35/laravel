/*
var Person = function (config) {
    this.name = config.name;
    this.age = config.age;
    this.occuption = config.occuption;
};

Person.prototype.work = function () {
    return this.name + 'is working :: ' + this.occuption;
}  */


var Person = Backbone.Model.extend({
    defaults : {
        'name'      : '',
        'age'       : '',
        'occuption' : ''
    },
    validate : function (attrs) {
        console.log(attrs);
        console.log('validate worked properly');
    },
    
    work : function () {
        return this.get('name') + "working as " + this.get('occuption ');
    }

});