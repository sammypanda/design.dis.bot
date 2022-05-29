# README

Dev Branch ✨

- ~~Create Dev Branch~~
- Finish the script used to generate and clarify what is needed (for releases)

---

General-purpose Bot Framework for Discord, powered by
[DiscordPHP](https://github.com/discord-php/DiscordPHP).

## Key Features


### Object Oriented Approach

Instead of doing this:

```
<?php

$discord->on(Event::MESSAGE_CREATE, function (Message $message, Discord $discord) {
    // ...
});
```

You can now create classes which do the same thing:

```
<?php

class Hello implements MessageCreate {

    public function message_create(Message $message, Discord $discord) {
        // ...
    }

}
```

### Zero Code Change Required to Existing Code

Each class you write is a truly drop-in module that, once placed in the
`/src/Extensions` folder, gets picked up by the bot. So, using the example
above, `/src/Extensions/Hello.php` would be picked up by the bot, and
displayed during startup:

```
$ php bot.php
1 active events: [
    MESSAGE_CREATE => [
        Soft321\Discord\Extensions\Hello
    ]
]

55 inactive events: [ RESUMED, PRESENCE_UPDATE, PRESENCES_REPLACE, TYPING_START, USER_SETTINGS_UPDATE, GUILD_MEMBERS_CHUNK, INTERACTION_CREATE, USER_UPDATE, GUILD_CREATE, GUILD_DELETE, GUILD_UPDATE, GUILD_BAN_ADD, GUILD_BAN_REMOVE, GUILD_EMOJIS_UPDATE, GUILD_STICKERS_UPDATE, GUILD_MEMBER_ADD, GUILD_MEMBER_REMOVE, GUILD_MEMBER_UPDATE, GUILD_ROLE_CREATE, GUILD_ROLE_UPDATE, GUILD_ROLE_DELETE, GUILD_SCHEDULED_EVENT_CREATE, GUILD_SCHEDULED_EVENT_UPDATE, GUILD_SCHEDULED_EVENT_DELETE, GUILD_SCHEDULED_EVENT_USER_ADD, GUILD_SCHEDULED_EVENT_USER_REMOVE, GUILD_INTEGRATIONS_UPDATE, INTEGRATION_CREATE, INTEGRATION_UPDATE, INTEGRATION_DELETE, WEBHOOKS_UPDATE, INVITE_CREATE, INVITE_DELETE, CHANNEL_CREATE, CHANNEL_DELETE, CHANNEL_UPDATE, CHANNEL_PINS_UPDATE, THREAD_CREATE, THREAD_UPDATE, THREAD_DELETE, THREAD_LIST_SYNC, THREAD_MEMBER_UPDATE, THREAD_MEMBERS_UPDATE, VOICE_STATE_UPDATE, VOICE_SERVER_UPDATE, STAGE_INSTANCE_CREATE, STAGE_INSTANCE_UPDATE, STAGE_INSTANCE_DELETE, MESSAGE_DELETE, MESSAGE_UPDATE, MESSAGE_DELETE_BULK, MESSAGE_REACTION_ADD, MESSAGE_REACTION_REMOVE, MESSAGE_REACTION_REMOVE_ALL, MESSAGE_REACTION_REMOVE_EMOJI ]
```

This output tells us that your bot is listening for 1 event named
`MESSAGE_CREATE` while ignoring all other events. This output also
tells us that there is a handler for the `MESSAGE_CREATE` event named
`Soft321\Discord\Extensions\Hello`.

This *object-oriented* approach solves the problem of 1000+ line bot.php files.

### Multiple Event Handlers for the Same Event

You can have multiple classes listening for the same event. So, if we
made a `Hello2` class that also implements `MessageCreate`, the bot would pick
that up as well:

```
$ php bot.php
1 active events: [
    MESSAGE_CREATE => [
        Soft321\Discord\Extensions\Hello, 
        Soft321\Discord\Extensions\Hello2
    ]
]
55 inactive events: [ RESUMED, PRESENCE_UPDATE, PRESENCES_REPLACE, TYPING_START, USER_SETTINGS_UPDATE, GUILD_MEMBERS_CHUNK, INTERACTION_CREATE, USER_UPDATE, GUILD_CREATE, GUILD_DELETE, GUILD_UPDATE, GUILD_BAN_ADD, GUILD_BAN_REMOVE, GUILD_EMOJIS_UPDATE, GUILD_STICKERS_UPDATE, GUILD_MEMBER_ADD, GUILD_MEMBER_REMOVE, GUILD_MEMBER_UPDATE, GUILD_ROLE_CREATE, GUILD_ROLE_UPDATE, GUILD_ROLE_DELETE, GUILD_SCHEDULED_EVENT_CREATE, GUILD_SCHEDULED_EVENT_UPDATE, GUILD_SCHEDULED_EVENT_DELETE, GUILD_SCHEDULED_EVENT_USER_ADD, GUILD_SCHEDULED_EVENT_USER_REMOVE, GUILD_INTEGRATIONS_UPDATE, INTEGRATION_CREATE, INTEGRATION_UPDATE, INTEGRATION_DELETE, WEBHOOKS_UPDATE, INVITE_CREATE, INVITE_DELETE, CHANNEL_CREATE, CHANNEL_DELETE, CHANNEL_UPDATE, CHANNEL_PINS_UPDATE, THREAD_CREATE, THREAD_UPDATE, THREAD_DELETE, THREAD_LIST_SYNC, THREAD_MEMBER_UPDATE, THREAD_MEMBERS_UPDATE, VOICE_STATE_UPDATE, VOICE_SERVER_UPDATE, STAGE_INSTANCE_CREATE, STAGE_INSTANCE_UPDATE, STAGE_INSTANCE_DELETE, MESSAGE_DELETE, MESSAGE_UPDATE, MESSAGE_DELETE_BULK, MESSAGE_REACTION_ADD, MESSAGE_REACTION_REMOVE, MESSAGE_REACTION_REMOVE_ALL, MESSAGE_REACTION_REMOVE_EMOJI ]

```

## Getting Started

### Create a Discord Application

Create a Discord Application [here](https://discord.com/developers/applications)
(skip this if you already have one).

### Add Bot Token to Project

Create a file named `conf/env.php` with the following contents:

```
<?php

$_ENV[ 'BOT_TOKEN' ] = 'bot_token';
$_ENV[ 'BOT_ID' ]    = 'bot_id';
```

Replace `bot_id` with your bot's ID, and `bot_token` with you're bot's token.

### Running your Bot

Type `php bot.php` to run your bot.

We have provided you with `/src/Extensions/Hello.php` as a sample handler to
help you get you started writing handlers of your own.

To test out this handler go to a Discord Server where your bot is installed.
Ensure your bot has appropriate permissions in that server. In any channel,
type the word "hello". Your bot should detect this and respond with a message.

### Understanding How it Works

Open up `src/Extensions/Hello.php`, to see how it actually works. Notice that
there is a class named `Hello` which implements an interface named
`MessageCreate`. As long as this class implements that interface, it will be
automatically picked up by the bot, and handle any `MESSAGE_CREATE` events
sent to it.

Try creating another class (e.g. `src/Extensions/Hello2.php`) that handles
messages in a different way. Writing your own event handlers is as easy as
creating a new class, then dropping it into the `src/Extensions/` folder.

### Writing Your own Handlers

A full list of events is contained in the `src/Events` folder. You can handle
any of these by creating a new class and implementing the interface for that
event.