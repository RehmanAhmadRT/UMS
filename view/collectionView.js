var app = app || {};
app.CollectionView = Backbone.View.extend({
    el: "#show",
    model: app.Stduent,
    template: Handlebars.compile($('#item-template').html()),
    initialize: function(student){
      //this.render();
      this.listenTo(student.collection,"change add set delete",this.render);
    },
    render: function(){
    this.$el.html(this.template(this.collection.toJSON()));
    return this;
    }
});
