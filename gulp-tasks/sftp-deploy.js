module.exports = function (gulp, sftp, wp, config, destination) {
  return function () {
    return gulp.src(wp.local_theme_folder)
    .pipe(sftp({
      host: config.sftp_host,
      user: config.sftp_user,
      pass: config.sftp_pass,
      remotePath: destination
    }));
  };
};
