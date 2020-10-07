Plugin Telegram Notify
======================

Telegram plugin for PHP Censor.

Add to project
--------------

In the PHP Censor Project config section add the Telegram trigger

```yaml
complete:
    telegram_notify:
        api_key: "<YOUR_BOT_TOKEN_HERE>"
        message: "[%ICON_BUILD%] [%PROJECT_TITLE%](%PROJECT_LINK%) - [Build #%BUILD_ID%](%BUILD_LINK%) has finished for commit [%SHORT_COMMIT_ID% (%COMMITTER_EMAIL%)](%COMMIT_LINK%) on branch [%BRANCH%](%BRANCH_LINK%)"
        recipients:
            - "<user id>"
            - "-<group id>"
            - "@<channel id>"
        send_log: true
```
