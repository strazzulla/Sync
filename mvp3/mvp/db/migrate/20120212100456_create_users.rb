class CreateUsers < ActiveRecord::Migration
  def change
    create_table :users do |t|
      t.string :email
      t.string :crypted_password
      t.string :password_salt
      t.string :persistence_token
      t.string :name
      t.string :last_name
      t.date :birthdate
      t.string :partner_email
      t.string :city
      t.string :country
      t.boolean :share_location
      t.string :mood
      t.string :activity

      t.timestamps
    end
  end
end
