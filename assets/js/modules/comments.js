import {
	activateEl,
	addListener,
	deActivateEl,
	definePopUp,
} from '../utils/functions';

export const Comments = () => {
	/* Open and Close Comment List */
	const commentOpener = document.getElementById('commentOpener');
	const commentOpenerIcon = document.getElementById('commentOpenerIcon');
	const commentList = document.getElementById('commentList');
	const commentCloser = document.getElementById('commentCloser');

	if (!commentOpener) return;
	if (!commentOpenerIcon) return;
	if (!commentList) return;
	if (!commentCloser) return;

	definePopUp(commentList);

	addListener(commentOpener, 'click', () => activateEl(commentList));
	addListener(commentOpenerIcon, 'click', () => activateEl(commentList));
	addListener(commentCloser, 'click', () => deActivateEl(commentList));

	/*Add New Comments */
	const addNewCommentForm = document.getElementById('addNewComment');
	const parentId = document.getElementById('parentID');
	const parentDiv = document.getElementById('parentDiv');
	const parentText = document.getElementById('parentText');
	const closeReply = document.getElementById('closeReply');
	const replyButtons = document.querySelectorAll('.comment__reply');
	const commentsMessage = document.getElementById('commentsMessage');

	if (!addNewCommentForm) return;

	addListener(closeReply, 'click', () => {
		deActivateEl(parentDiv);
		parentId.value = '';
	});

	replyButtons.forEach((button) => {
		addListener(button, 'click', () => {
			activateEl(parentDiv);
			commentList.scrollTo({ top: 0, behavior: 'smooth', left: 0 });
			parentText.innerText = button.dataset.commentText;
			parentId.value = button.dataset.commentId;
		});
	});

	addListener(addNewCommentForm, 'submit', (e) => {
		e.preventDefault();

		const formData = new FormData(e.currentTarget, e.submitter);
		formData.append('action', 'cyn_add_new_comment');
		formData.append('_nonce', cyn_head_script.nonce);

		jQuery(($) => {
			$.ajax({
				type: 'POST',
				url: cyn_head_script.url,
				cache: false,
				processData: false,
				contentType: false,
				data: formData,

				success: (res) => {
					if (res?.commentStatus === 0) {
						setWarningComment(commentsMessage);
						return;
					}
					if (res?.commentStatus === 1) {
						setSuccessComment(commentsMessage);
						return;
					}

					setErrorComment(commentsMessage);
				},
			});
		});
	});
};

const setWarningComment = (commentsMessage) => {
	const span = document.createElement('span');
	span.classList.add('warning');
	span.innerText = 'کامنت شما با موفقیت ثبت شد و در انتظار تایید است';
	commentsMessage.appendChild(span);
};

const setSuccessComment = (commentsMessage) => {
	const span = document.createElement('span');
	span.classList.add('success');
	span.innerText = 'کامنت شما با موفقیت ثبت شد';
	commentsMessage.appendChild(span);
};

const setErrorComment = (commentsMessage) => {
	const span = document.createElement('span');
	span.classList.add('error');
	span.innerText = 'خطایی در ثبت کامنت به وجود آمده است!';
	commentsMessage.appendChild(span);
};
