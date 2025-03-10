/*
* Post create page
 */
"use strict";
/* global FileUpload, PostCreate, PostCreate, postData, trans */

$(function () {
    // Initing button save
    $('.post-create-button').on('click',function () {
        PostCreate.save('update',postData.id);
    });
    PostCreate.initPostDraft(postData,'edit');
    PostCreate.postPrice = postData.price;
    FileUpload.initDropZone('.dropzone','/attachment/upload/post');
    if(postData.hasPoll){
        PostCreate.savePoll();
    }
});

// Saving draft data before unload
window.addEventListener('beforeunload', function (event) {
    // Forcing a dialog when a file is being uploaded/video transcoded
    if(FileUpload.isTranscodingVideo === true || FileUpload.isLoading === true){
        event.returnValue = trans('Are you sure you want to leave?');
    }
});
