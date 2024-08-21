import './bootstrap';
import $ from "jquery";
window.$ = $;

$(document).ready(function () {
    $(".pass-eye").on('click', function(event) {
        if($(this).parent().find('input').attr("type") === "text"){
            $(this).parent().find('input').attr('type', 'password');
            $(this).find('i').removeClass( "fa-eye" ).addClass( "fa-eye-slash" );
        }else if($(this).parent().find('input').attr("type") === "password"){
            $(this).parent().find('input').attr('type', 'text');
            $(this).find('i').removeClass( "fa-eye-slash" ).addClass( "fa-eye" );
        }
    });

    Sortable.create(to_do, {
        animation: 100,
        group: 'list-1',
        draggable: '.list-group-item',
        handle: '.list-group-item',
        sort: true,
        filter: '.sortable-disabled',
        chosenClass: 'active'
    });
    Sortable.create(doing, {
        group: 'list-1',
        handle: '.list-group-item'
    });
    Sortable.create(done, {
        group: 'list-1',
        handle: '.list-group-item'
    });

    jalaliDatepicker.startWatch({
        minDate: "attr",
        maxDate: "attr",
        minTime: "attr",
        maxTime: "attr",
        hideAfterChange: false,
        autoHide: true,
        showTodayBtn: true,
        showEmptyBtn: true,
        topSpace: 10,
        bottomSpace: 30,
        dayRendering(opt,input){
            return {
                isHollyDay:opt.day==1
            }
        }
    });
});
