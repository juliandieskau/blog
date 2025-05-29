// Store for each blog page which comment was already liked, disliked and reported in local storage
// Also checks locally to prevent buttons from being pressed repeatedly.
// Not "safe", but saves server ressources by only checking locally and prevents the easiest abuse cases. 
// Since this blogs comments aren't really important this amount of safety is enough.
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.comment-box').forEach(commentBox => {
    // Use the dataset API to read data from data-<name> attributes, with the dataset.<name> camelCased
    const commentId = commentBox.dataset.id;
    const tableName = commentBox.dataset.table;
    const voteKey = `vote_${tableName}_${commentId}`;
    const reportKey = `report_${tableName}_${commentId}`;

    const likeBtn = commentBox.querySelector('.like-button');
    const dislikeBtn = commentBox.querySelector('.dislike-button');
    const reportBtn = commentBox.querySelector('.report-button');

    const storedVote = localStorage.getItem(voteKey);
    const reported = localStorage.getItem(reportKey);

    // Disable like/dislike if already voted
    if (storedVote === 'like') {
      likeBtn.disabled = true;
      dislikeBtn.disabled = true;
      likeBtn.classList.add('voted');
    } else if (storedVote === 'dislike') {
      likeBtn.disabled = true;
      dislikeBtn.disabled = true;
      dislikeBtn.classList.add('voted');
    }

    // Disable report if already reported
    if (reported === 'true') {
      reportBtn.disabled = true;
      reportBtn.classList.add('voted');
    }

    // Save like button press
    likeBtn?.addEventListener('click', () => {
      localStorage.setItem(voteKey, 'like');
    });

    // Save dislike button press
    dislikeBtn?.addEventListener('click', () => {
      localStorage.setItem(voteKey, 'dislike');
    });

    // Save report button press
    reportBtn?.addEventListener('click', () => {
      localStorage.setItem(reportKey, 'true');
    });
  });
});