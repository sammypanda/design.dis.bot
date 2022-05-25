# README

General-purpose Bot Framework for Discord.

## Add Bot to Server

Bots must be added via OAUTH2 invite link.

First, you generate permissions with this utility?
https://discord.com/developers/applications/971109483654811658/oauth2/url-generator

Scopes:
- application.commands
- bot

Permissions:
- administrator (for development purposes)

Example:
https://discord.com/api/oauth2/authorize?client_id=971109483654811658&permissions=8&scope=bot