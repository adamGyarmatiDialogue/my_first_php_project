-- Create users table --
CREATE TABLE IF NOT EXISTS users (
  id BIGINT NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(255) NOT NULL,
  last_name VARCHAR(255) NOT NULL,
  username VARCHAR(255) NOT NULL,
  email VARCHAR(512) NOT NULL,
  password VARCHAR(255) NOT NULL,
  is_admin TINYINT(1) DEFAULT 0,
  is_builtin TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id),
  UNIQUE (username),
  UNIQUE (email)
);

-- Add status column to the users table
ALTER TABLE users
ADD COLUMN status TINYINT DEFAULT 0
AFTER is_builtin;

-- Create the users log table
CREATE TABLE IF NOT EXISTS users_logs (
  id BIGINT NOT NULL AUTO_INCREMENT,
  user_id BIGINT NOT NULL DEFAULT(0),
  object_name VARCHAR(255) NOT NULL,
  object_id VARCHAR(255) NOT NULL,
  event_name VARCHAR(255) NOT NULL,
  status TINYINT DEFAULT(0),
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id)
);

-- Create the users login table
CREATE TABLE IF NOT EXISTS users_logins (
  id BIGINT NOT NULL AUTO_INCREMENT,
  user_id BIGINT NOT NULL DEFAULT(0),
  ip_address VARCHAR(255) NULL,
  device_name VARCHAR(255) NULL,
  status TINYINT DEFAULT(0),
  created_at TIMESTAMP DEFAULT NOW(),
  updated_at TIMESTAMP DEFAULT NOW(),
  PRIMARY KEY (id)
);