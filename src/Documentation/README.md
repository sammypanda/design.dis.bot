# README

General-purpose Bot Framework for Discord.

## Add Bot to Server

Bots are added to guilds using invite links. But first, you will need to
generate an invite link.

To generate one for your bot, go here:
https://discord.com/developers/applications/bot_id/oauth2/url-generator

Replace `bot_id` in the URL above with your bot's own ID.

During development, it is easiest to create an invite link using these params:
- Scopes: bot
- Permissions: administrator

Later on, when your bot becomes ready for other guilds to use, you can
restrict the permissions a bit further. But for development, this is fine.

Here's an example invite link that would have resulted from using those params:
https://discord.com/api/oauth2/authorize?client_id=bot_id&permissions=8&scope=bot

Where `bot_id` in the URL above is your own bot's ID.

## Add Bot Token to Project

Create a file named `conf/env.php` with the following contents:

```
<?php

$_ENV[ 'BOT_TOKEN' ] = 'bot_token';
$_ENV[ 'BOT_ID' ]    = 'bot_id';
```

Replace `bot_id` with your bot's ID, and `bot_token` with you're bot's token.

## Running your Bot

Type `php bot.php` to run your bot.

You should see command-line output that looks similar to this:

```
1 active events: [
    MESSAGE_CREATE => [
        Soft321\Discord\Extensions\Hello
    ]
]

55 inactive events: [ RESUMED, PRESENCE_UPDATE, PRESENCES_REPLACE, TYPING_START, USER_SETTINGS_UPDATE, GUILD_MEMBERS_CHUNK, INTERACTION_CREATE, USER_UPDATE, GUILD_CREATE, GUILD_DELETE, GUILD_UPDATE, GUILD_BAN_ADD, GUILD_BAN_REMOVE, GUILD_EMOJIS_UPDATE, GUILD_STICKERS_UPDATE, GUILD_MEMBER_ADD, GUILD_MEMBER_REMOVE, GUILD_MEMBER_UPDATE, GUILD_ROLE_CREATE, GUILD_ROLE_UPDATE, GUILD_ROLE_DELETE, GUILD_SCHEDULED_EVENT_CREATE, GUILD_SCHEDULED_EVENT_UPDATE, GUILD_SCHEDULED_EVENT_DELETE, GUILD_SCHEDULED_EVENT_USER_ADD, GUILD_SCHEDULED_EVENT_USER_REMOVE, GUILD_INTEGRATIONS_UPDATE, INTEGRATION_CREATE, INTEGRATION_UPDATE, INTEGRATION_DELETE, WEBHOOKS_UPDATE, INVITE_CREATE, INVITE_DELETE, CHANNEL_CREATE, CHANNEL_DELETE, CHANNEL_UPDATE, CHANNEL_PINS_UPDATE, THREAD_CREATE, THREAD_UPDATE, THREAD_DELETE, THREAD_LIST_SYNC, THREAD_MEMBER_UPDATE, THREAD_MEMBERS_UPDATE, VOICE_STATE_UPDATE, VOICE_SERVER_UPDATE, STAGE_INSTANCE_CREATE, STAGE_INSTANCE_UPDATE, STAGE_INSTANCE_DELETE, MESSAGE_DELETE, MESSAGE_UPDATE, MESSAGE_DELETE_BULK, MESSAGE_REACTION_ADD, MESSAGE_REACTION_REMOVE, MESSAGE_REACTION_REMOVE_ALL, MESSAGE_REACTION_REMOVE_EMOJI ]
```

This output tells us that your bot is listening for 1 event named
`MESSAGE_CREATE` while ignoring all other events.

This output also tells us that there is a handler for the `MESSAGE_CREATE`
event named `Soft321\Discord\Extensions\Hello`. That's because we have
provided you with this as a sample handler as a template to get you started
writing handlers of your own.

To test out this handler go to your Discord Server. In any channel, type the
word "hello". The bot should detect it and respond to it with a message.


## Writing your own Handlers

Open up `src/Extensions/Hello.php`, to see how it actually works. After you
understand how it works, you will be able to write some handlers of your own.
You should notice that it is a class named `Hello` which implements an
interface named `MessageCreate`.

As long as this class implements this interface, it will be automatically
picked up by the bot, and used to handle `MESSAGE_CREATE` events sent to it.

Further, you can create another class (e.g. `src/Extensions/Hello2.php`) that
handles messages in a different way. Then, restart the bot and you should see
something like this:

```
1 active events: [
    MESSAGE_CREATE => [
        Soft321\Discord\Extensions\Hello, 
        Soft321\Discord\Extensions\Hello2
    ]
]
55 inactive events: [ RESUMED, PRESENCE_UPDATE, PRESENCES_REPLACE, TYPING_START, USER_SETTINGS_UPDATE, GUILD_MEMBERS_CHUNK, INTERACTION_CREATE, USER_UPDATE, GUILD_CREATE, GUILD_DELETE, GUILD_UPDATE, GUILD_BAN_ADD, GUILD_BAN_REMOVE, GUILD_EMOJIS_UPDATE, GUILD_STICKERS_UPDATE, GUILD_MEMBER_ADD, GUILD_MEMBER_REMOVE, GUILD_MEMBER_UPDATE, GUILD_ROLE_CREATE, GUILD_ROLE_UPDATE, GUILD_ROLE_DELETE, GUILD_SCHEDULED_EVENT_CREATE, GUILD_SCHEDULED_EVENT_UPDATE, GUILD_SCHEDULED_EVENT_DELETE, GUILD_SCHEDULED_EVENT_USER_ADD, GUILD_SCHEDULED_EVENT_USER_REMOVE, GUILD_INTEGRATIONS_UPDATE, INTEGRATION_CREATE, INTEGRATION_UPDATE, INTEGRATION_DELETE, WEBHOOKS_UPDATE, INVITE_CREATE, INVITE_DELETE, CHANNEL_CREATE, CHANNEL_DELETE, CHANNEL_UPDATE, CHANNEL_PINS_UPDATE, THREAD_CREATE, THREAD_UPDATE, THREAD_DELETE, THREAD_LIST_SYNC, THREAD_MEMBER_UPDATE, THREAD_MEMBERS_UPDATE, VOICE_STATE_UPDATE, VOICE_SERVER_UPDATE, STAGE_INSTANCE_CREATE, STAGE_INSTANCE_UPDATE, STAGE_INSTANCE_DELETE, MESSAGE_DELETE, MESSAGE_UPDATE, MESSAGE_DELETE_BULK, MESSAGE_REACTION_ADD, MESSAGE_REACTION_REMOVE, MESSAGE_REACTION_REMOVE_ALL, MESSAGE_REACTION_REMOVE_EMOJI ]
```

So, writing your own event handlers is as easy as creating a new class, then
dropping it into the `src/Extensions/` folder. *No other code change is required*.