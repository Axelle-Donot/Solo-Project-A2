<div class='position-fixed end-0 p-3' style='z-index: 11; top: 25%'>
  <div class='toast show shadow fade' role='alert' aria-live='assertive' data-bs-autohide='false' aria-atomic='true'>
    <div class='toast-header'>
      <strong class='me-auto'><?= htmlspecialchars($title ?? "default") ?></strong>
      <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
    </div>
    <div class='toast-body bg-dark'><?= htmlspecialchars($details ?? "default") ?></div>
  </div>
</div>