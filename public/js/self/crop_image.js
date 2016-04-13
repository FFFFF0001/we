/**
 * Created by mj on 2016/3/29.
 */
define(['jquery','cropper'],function(){
    function c(target){         //生产cropper，图片复制
        var $previews = $('.preview');
        target.cropper('destroy');
        target.cropper({
            aspectRatio: 1,
            build: function (e) {
                var $clone = $(this).clone();

                $clone.css({
                    display: 'inline',
                    width: '100%',
                    minWidth: 0,
                    minHeight: 0,
                    maxWidth: 'none',
                    maxHeight: 'none'
                });

                $previews.css({
                    width: '100%',
                    overflow: 'hidden'
                }).html($clone);
            },

            crop: function (e) {
                var imageData = $(this).cropper('getImageData');
                var previewAspectRatio = e.width / e.height;

                $previews.each(function () {
                    var $preview = $(this);
                    var previewWidth = $preview.width();
                    var previewHeight = previewWidth / previewAspectRatio;
                    var imageScaledRatio = e.width / previewWidth;

                    $preview.height(previewHeight).find('img').css({
                        width: imageData.naturalWidth / imageScaledRatio,
                        height: imageData.naturalHeight / imageScaledRatio,
                        marginLeft: -e.x / imageScaledRatio,
                        marginTop: -e.y / imageScaledRatio
                    });
                });
            }

        })
    }
    //剪切图片
    function getRoundedCanvas(sourceCanvas) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;

        canvas.width = width;
        canvas.height = height;
        context.beginPath();
        context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI);
        context.strokeStyle = 'rgba(0,0,0,0)';
        context.stroke();
        context.clip();
        context.drawImage(sourceCanvas, 0, 0, width, height);

        return canvas;
    }

    return {c:c,g:getRoundedCanvas}
})