class User < ActiveRecord::Base
  acts_as_authentic
  validates_presence_of :email, :partner_email
end
