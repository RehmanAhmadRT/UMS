var app = app || {};
app.Student = Backbone.Model.extend({
   defaults: {
   sid: '0',
   sname: 'Default',
   fk_tid:'',
   fk_cid:''
 },
 idAttribute: 'sid',
   urlRoot: 'index.php'
});
