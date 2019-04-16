ALTER TABLE `message` ADD COLUMN `forward_signature` TEXT NULL DEFAULT NULL COMMENT 'For messages forwarded from channels, signature of the post author if present' AFTER `forward_from_message_id`;
ALTER TABLE `message` ADD COLUMN `forward_sender_name` TEXT NULL DEFAULT NULL COMMENT 'Sender''s name for messages forwarded from users who disallow adding a link to their account in forwarded messages' AFTER `forward_signature`;
ALTER TABLE `message` ADD COLUMN `poll` TEXT COMMENT 'Poll object. Message is a native poll, information about the poll' AFTER `venue`;
