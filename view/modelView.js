var app = app || {};
app.StudentView = Backbone.View.extend({
    el: "#show",
    template: Handlebars.compile($('#item-template').html()),
    initialize: function(student){
      //this.render();
      this.listenTo(student.model,"change add set delete",this.render);
    },
    render: function(){
      if(this.model!=null){
      this.$el.html(this.template(this.model.toJSON()));
      return this;
      }
    }
});
