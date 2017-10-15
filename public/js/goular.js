/**
 *  作者:@Goular
 *  创建时间:2017-10-15
 *  作用:自定义一般使用jquery方法
 */

// /**
//  * 双击文字变成输入框效果
//  * @param element
//  * @constructor
//  */
// function ShowElement(element) {
//     var parent = $(element);
//     var oldhtml = parent.html();   //获得元素之前的内容
//     //var newobj = document.createElement('input');   //创建一个input元素
//     var newobj = $('<input type="text" class="form-control text-center">');
//     //newobj.type = 'text';   //为newobj元素添加类型
//     //设置newobj失去焦点的事件
//     newobj.blur(function () {
//
//         //parent.innerHTML = this.value ? this.value : oldhtml;   //当触发时判断newobj的值是否为空，为空则不修改，并返回oldhtml。
//         var value = $(this).val(); // 获取值
//         value = $.trim(value); // 用jQuery的trim方法删除前后空格
//         parent.empty();
//         if (value == '') {// 判断是否是空字符串，而不是null
//             parent.text(oldhtml)
//         } else {
//             parent.text(value);
//         }
//     });
//     parent.empty();   //设置元素内容为空
//     parent.append(newobj);   //添加子元素
//     newobj.focus();   //获得焦点
// }