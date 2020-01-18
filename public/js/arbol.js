(function ($) {

  $.fn.categorytree = function (settings) {

    var isMethodCall = (typeof settings === 'string'), // is this a method call like $().categorytree("unselect")
      returnValue = this;
    // if a method call execute the method on all selected instances
    if (isMethodCall) {
      switch (settings) {
        case 'unselect':
          this.find('.radio > label > input:radio').prop('checked', false);
          // TODO: add a callback method feature?
          break;
        case 'unfold':
          this.find('ul').show();
          this.find('li').has('ul').removeClass('more').addClass('less');
          break;
        case 'fold':
          this.find('ul ul').hide();
          this.find('li').has('ul').removeClass('less').addClass('more');
          break;
        default:
          throw 'Unknown method';
      }
    }
    // initialize tree
    else {
        var clickHandler = function (event) {
          var $ui = $(event.target);
          if ($ui.attr('type') === 'radio' || $ui.attr('type') === 'checkbox') {
            return;
          } else {
            event.stopPropagation();
          }

          if ($ui.next('ul').length === 0) {
            $ui = $ui.parent();
          }

          $ui.next('ul').toggle();
          if ($ui.next('ul').is(':visible')) {
            $ui.parent('li').removeClass('more').addClass('less');
          } else {
            $ui.parent('li').removeClass('less').addClass('more');
          }

          return false;
    };
      this.find('li > ul').each(function (i, item) {
        var $inputWrapper = $(item).prev('div');
        $inputWrapper.on('click', clickHandler);
        $inputWrapper.find('label').on('click', clickHandler);

        if ($(item).is(':visible')) {
          $(item).parent('li').removeClass('more').addClass('less');
        } else {
          $(item).parent('li').removeClass('less').addClass('more');
        }
      });
    }
    // return the jquery selection (or if it was a method call that returned a value - the returned value)
    return returnValue;
  };
})(jQuery);