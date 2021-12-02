<div class='position-fixed top-0 end-0 p-3' style='z-index: 11'>
  <div id='liveToast' class='toast show bg-dark' role='alert' aria-live='assertive' data-bs-autohide='false' aria-atomic='true'>
    <div class='toast-header'>
      <strong class='me-auto'><?= htmlspecialchars($title ?? "default") ?></strong>
      <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
    </div>
    <div class='toast-body'><?= htmlspecialchars($details ?? "default") ?></div>
  </div>
</div>